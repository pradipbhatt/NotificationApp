<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CheckUserStatus extends Command
{
    protected $signature = 'user:check-status';
    protected $description = 'Check user status and update expired memberships';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        // Get users whose status is 0
        $expiredUsers = User::where('status', 0)->get();

        foreach ($expiredUsers as $user) {
            // Log the user whose status is 0
            Log::info("User {$user->name} ({$user->email}) membership expired. Updating status.");

            // Update the user status to 1 (you can adjust this logic depending on your requirements)
            $user->status = 1;  // Change status from 0 to 1
            $user->save();      // Save the changes to the database

            $this->info("Updated user status: {$user->name} ({$user->email})");
        }

        $this->info("Checked and updated user statuses.");
    }
}
