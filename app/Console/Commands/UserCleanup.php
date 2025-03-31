<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserCleanup extends Command
{
    protected $signature = 'user:cleanup';
    protected $description = 'Clean up inactive users and perform database cleanup tasks';

    public function handle()
    {
        // Log the start of the cleanup process
        Log::info('Starting user cleanup...');

        // Implement the logic to cleanup users
        $inactiveUsers = User::where('last_login', '<', now()->subMonths(6))->get();

        foreach ($inactiveUsers as $user) {
            // Log each inactive user being deleted
            Log::info("Deleting inactive user: {$user->name} ({$user->email})");

            // Delete the inactive user
            $user->delete();
        }

        // Log the completion of the cleanup task
        Log::info('User cleanup completed.');
    }
}
