<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Mail\HelloMail;

class EmailTest extends TestCase
{
    use RefreshDatabase;

    public function testSendNotificationEmail()
    {
        Mail::fake();

        $response = $this->post('/api/mail/notification', [
            'user' => 'rodrigobustamantec01@gmail.com',
            'title' => 'Test Notification',
            'message' => 'This is a test notification message.',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Notification Email Sent Successfully']);

        Mail::assertSent(HelloMail::class, function ($mail) {
            return $mail->hasTo('rodrigobustamantec01@gmail.com') &&
                   $mail->messageContent['title'] === 'Test Notification' &&
                   $mail->messageContent['message'] === 'This is a test notification message.';
        });
    }

    public function testSendAlertEmailWithAttachment()
    {
        Mail::fake();

        $response = $this->post('/api/mail/alert', [
            'user' => 'rodrigobustamantec01@gmail.com',
            'title' => 'Test Alert',
            'message' => 'This is a test alert message.',
            'file' => [
                new \Illuminate\Http\UploadedFile(resource_path('test-files/sample.pdf'), 'sample.pdf', null, null, true)
            ]
        ]);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Alert Email Sent Successfully']);

        Mail::assertSent(HelloMail::class, function ($mail) {
            return $mail->hasTo('rodrigobustamantec01@gmail.com') &&
                   $mail->messageContent['title'] === 'Test Alert' &&
                   $mail->messageContent['message'] === 'This is a test alert message.' &&
                   count($mail->attachments) > 0;
        });
    }
}
