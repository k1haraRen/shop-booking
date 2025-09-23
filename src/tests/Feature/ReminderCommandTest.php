<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Mail\ReservationReminderMail;

class ReminderCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function reminders_command_queues_emails_and_marks_reservations()
    {
        Mail::fake();

        $user = User::factory()->create(['email' => 'a@example.test']);
        $shop = Shop::factory()->create();
        // 今日の予約で check = false
        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'date' => Carbon::today()->toDateString(),
            'time' => '18:00',
            'headcount' => '2',
            'check' => false,
        ]);

        // コマンド実行（アーティザンコマンド）
        $this->artisan('reminders:send')
            ->assertExitCode(0);

        // メールがキューに入っていること
        Mail::assertQueued(ReservationReminderMail::class, function ($mail) use ($reservation) {
            return $mail->reservation->id === $reservation->id;
        });

        // reservation がチェック済みになっている
        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'check' => true,
        ]);
    }
}
