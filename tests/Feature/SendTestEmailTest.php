<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Tests\TestCase;

class SendTestEmailTest extends TestCase
{
    /**
     * Test if the email is sent.
     *
     * @return void
     */
    public function test_email_is_sent()
    {
        // Fake the Mail facade to catch the sent emails
        Mail::fake();

        // Dispatch the email
        Mail::to('bhattsammar04@gmail.com')->send(new TestMail());

        // Assert that the email was sent
        Mail::assertSent(TestMail::class);

        // Optionally, check that the email was sent to the correct address
        Mail::assertSent(TestMail::class, function ($mail) {
            return $mail->hasTo('recipient@example.com');
        });
    }
}
