<?php

namespace App\Console;

use App\Models\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */


    /**
     * Define the application's command schedule.
     */
    // $schedule->command('inspire')->hourly();

//        $schedule->command('posts:process-scheduled')->everyMinute();

    protected function schedule(Schedule $schedule): void
    {


        $schedule->command('post:scheduler')
            ->everyMinute();

    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
