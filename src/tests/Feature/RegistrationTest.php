<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'taro',
            'email' => 'taro@example.test',
            'password' => 'password',
        ]);

        $response->assertRedirect(); // 登録後のリダイレクトを検証

        $this->assertDatabaseHas('users', [
            'email' => 'taro@example.test'
        ]);
    }
}
