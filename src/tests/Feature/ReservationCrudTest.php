<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;

class ReservationCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_reservation()
    {
        $user = User::factory()->create();
        $shop = Shop::factory()->create();

        $this->actingAs($user)
            ->post(route('reservation.store'), [
                'shop_id' => $shop->id,
                'date' => now()->addDays(3)->toDateString(),
                'time' => '18:00',
                'headcount' => 2,
            ])->assertRedirect();

        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'headcount' => 2,
        ]);
    }

    /** @test */
    public function user_can_update_own_reservation()
    {
        $user = User::factory()->create();
        $shop = Shop::factory()->create();
        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'date' => now()->addDay()->toDateString(),
            'time' => '18:00',
            'headcount' => 2,
        ]);

        $this->actingAs($user)
            ->put(route('reservation.update', $reservation->id), [
                'date' => now()->addDays(2)->toDateString(),
                'time' => '19:00',
                'headcount' => 3,
            ])->assertRedirect();

        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'headcount' => 3,
            'time' => '19:00',
        ]);
    }

    /** @test */
    public function user_can_delete_own_reservation()
    {
        $user = User::factory()->create();
        $shop = Shop::factory()->create();
        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'date' => now()->addDay()->toDateString(),
            'time' => '18:00',
            'headcount' => 2,
        ]);

        $this->actingAs($user)
            ->delete(route('reservation.destroy', $reservation->id))
            ->assertRedirect();

        $this->assertDatabaseMissing('reservations', [
            'id' => $reservation->id
        ]);
    }
}
