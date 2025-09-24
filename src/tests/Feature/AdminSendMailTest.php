<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Models\User;
use App\Mail\NotifyAllUsersMail;

class AdminSendMailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_send_mail_to_all_users()
    {
        Mail::fake();

        $admin = User::factory()->create(['admin' => true]);
        User::factory()->count(2)->create();

        $this->actingAs($admin)
            ->post(route('admin.mail.send'), ['content' => '管理からのお知らせ'])
            ->assertRedirect();

        Mail::assertQueued(NotifyAllUsersMail::class, 3);
    }
}
