<?php

use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);

Route::get('send-test-email', function () {
    // Send the email
    Mail::to('bhattsammar04@gmail.com')->send(new TestMail());

    return 'Test email sent!';
});