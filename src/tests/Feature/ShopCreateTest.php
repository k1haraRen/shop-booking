<?php

namespace Tests\Feature;

use finfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use App\Models\User;
use App\Models\Shop;

class ShopCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_shop()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('shop.create'), [
                'shop_name' => 'shop_name',
                'introduction' => 'introduction',
            ])->assertRedirect();

        $this->assertDatabaseHas('shops', [
            'user_id' => $user->id,
            'shop_name' => 'shop_name',
            'introduction' => 'introduction',
        ]);
    }
}
