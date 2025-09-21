<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use App\Mail\ReservationReminderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SendReservationReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send {--date= : YYYY-MM-DD to target a specific date (for testing)} {--force : ignore check flag and force send}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails for reservations happening on the target date (default: today)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $date = $this->option('date') ?? Carbon::today(config('app.timezone'))->toDateString();
        $force = $this->option('force');

        $this->info("Sending reminders for date: {$date} (force: " . ($force ? 'yes' : 'no') . ")");

        $query = Reservation::whereDate('date', $date);

        if (!$force) {
            $query->where('check', false);
        }

        // Optional: exclude cancelled reservations if you have a cancelled flag
        //if (SchemaHasColumn('reservations', 'cancelled_at')) {
        //    $query->whereNull('cancelled_at');
        //}

        $query->orderBy('date')->orderBy('time');

        $query->chunkById(100, function ($reservations) use ($force) {
            foreach ($reservations as $reservation) {
                try {
                    $user = $reservation->reservationUser ?? null;
                    if (!$user || !filter_var($user->email ?? '', FILTER_VALIDATE_EMAIL)) {
                        Log::warning("Reservation {$reservation->id} has no valid user/email");
                        continue;
                    }

                    Mail::to($user->email)->queue(new ReservationReminderMail($reservation));

                    $reservation->update(['check' => true]);
                } catch (\Throwable $e) {
                    Log::error("Failed to queue reminder for reservation {$reservation->id}: {$e->getMessage()}");
                }
            }
        });

        $this->info('Reminders processed.');
    }
}
