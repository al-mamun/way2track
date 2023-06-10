<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
<<<<<<< HEAD
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DemoCron::class,
    ];
     
    /**
=======
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
<<<<<<< HEAD
     
        $schedule->command('demo:cron')
                 ->everyThreeMinutes();
    }
     
=======
        // $schedule->command('inspire')->hourly();
    }

>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
<<<<<<< HEAD
     
=======

>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
        require base_path('routes/console.php');
    }
}
