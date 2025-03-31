<?php

use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\CheckUserStatus;

Artisan::command('user:check-status', function () {
    $this->call(CheckUserStatus::class);
})->describe('Check user status and update expired memberships');
