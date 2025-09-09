<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAllUsersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function build()
    {
        return $this->subject('お知らせ')
            ->view('emails.notify_all')
            ->with(['content' => $this->content]);
    }
}
