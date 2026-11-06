<?php

namespace Tests\Feature;

use App\Jobs\SendWaitlistEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ComingSoonTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_shows_coming_soon(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('COMING SOON');
        $response->assertSee('images/logo.svg', false);
        $response->assertSee('id="bg-canvas"', false);
        $response->assertSee('DAPATKAN NOTIFIKASI SAAT KAMI LAUNCH');
        $response->assertDontSee('class="disc"');
    }

    public function test_notify_stores_valid_email(): void
    {
        Queue::fake();

        $response = $this->post('/notify', ['email' => 'baca@cathena.id']);

        $response->assertRedirect('/');
        $response->assertSessionHas('notified', true);
        $this->assertDatabaseHas('notify_subscriptions', ['email' => 'baca@cathena.id']);
        Queue::assertPushed(SendWaitlistEmail::class, fn ($job) => $job->email === 'baca@cathena.id');
    }

    public function test_notify_rejects_invalid_email(): void
    {
        Queue::fake();

        $response = $this->post('/notify', ['email' => 'bukan-email']);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('notify_subscriptions', 0);
    }

    public function test_notify_blocks_resubscribe_after_notified(): void
    {
        Queue::fake();

        DB::table('notify_subscriptions')->insert([
            'email' => 'baca@cathena.id',
            'notified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->post('/notify', ['email' => 'baca@cathena.id']);

        $response->assertRedirect('/');
        $response->assertSessionHas('already', true);
        Queue::assertNotPushed(SendWaitlistEmail::class);
        $this->assertDatabaseCount('notify_subscriptions', 1);
    }

    public function test_notify_resends_when_previous_mail_unsent(): void
    {
        Queue::fake();

        DB::table('notify_subscriptions')->insert([
            'email' => 'baca@cathena.id',
            'notified_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->post('/notify', ['email' => 'baca@cathena.id']);

        $response->assertSessionHas('notified', true);
        Queue::assertPushed(SendWaitlistEmail::class);
        $this->assertDatabaseCount('notify_subscriptions', 1);
    }
}
