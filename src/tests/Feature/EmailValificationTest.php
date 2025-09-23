<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\User;

class EmailValificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function verification_notification_is_sent_after_registration()
    {
        Notification::fake();

        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // 例: 登録時に自動で通知が送られる実装なら、それを呼ぶか send manually:
        $user->sendEmailVerificationNotification();

        Notification::assertSentTo($user, VerifyEmail::class);
    }

    /** @test */
    public function user_can_verify_email_using_temporary_signed_url()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // 署名付きURLを作る
        $signedUrl = URL::temporarySignedRoute(
            'verification.verify', // ルート名（アプリのルート定義に合わせる）
            Carbon::now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        // 署名付きURLにアクセス（ログインしている状態が必要な場合は actingAs）
        $response = $this->actingAs($user)->get($signedUrl);

        // 成功時の挙動に合わせてアサーション（例: redirect）
        $response->assertStatus(302);

        $this->assertNotNull($user->fresh()->email_verified_at);
    }
}
