<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_toggle_favorite()
    {
        $user = User::factory()->create();
        $shop = Shop::factory()->create();

        $this->actingAs($user)
            ->post(route('favorite.toggle', ['shop' => $shop->id]))
            ->assertStatus(200); // 実装に応じて 200 or json or redirect

        // favorites テーブルの存在を検証（pivot）
        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);

        // 再度押すと消える（toggle）
        $this->actingAs($user)
            ->post(route('favorite.toggle', ['shop' => $shop->id]));

        $this->assertDatabaseMissing('favorites', [
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);
    }
}
