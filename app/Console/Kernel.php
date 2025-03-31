<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Schedule the 'user:check-status' command every minute
        $schedule->command('user:check-status')->everyMinute()->before(function () {
            // \Log::info('Starting user status check...');
        })->after(function () {
            // \Log::info('Finished user status check.');
        });

        // Schedule another command every hour
        $schedule->command('user:send-daily-report')->hourly()->before(function () {
            // \Log::info('Starting daily report generation...');
        })->after(function () {
            // \Log::info('Finished daily report generation.');
        });

        // Schedule another task for another command
        $schedule->command('user:cleanup')->dailyAt('02:00')->before(function () {
        })->after(function () {
        });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
