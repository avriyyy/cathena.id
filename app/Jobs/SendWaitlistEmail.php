<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;
use Resend;

class SendWaitlistEmail implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $email) {}

    public function handle(): void
    {
        Resend::client(config('services.resend.key'))->emails->send([
            'from' => 'Cathena <hello@cathena.id>',
            'to' => $this->email,
            'template' => [
                'id' => 'waitlist-confirmation',
                'variables' => ['SUBSCRIBER_EMAIL' => $this->email],
            ],
        ]);

        DB::table('notify_subscriptions')->where('email', $this->email)->update([
            'notified_at' => now(),
        ]);
    }
}
