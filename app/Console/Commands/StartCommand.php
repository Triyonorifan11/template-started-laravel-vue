<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the application with migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // $this->info('Migrating database if not migrated yet');
        // $this->call('migrate');
        $this->info('🔥🔥 Starting Application 🔥🔥');
        $this->info('👨‍💻👨‍💻 Let`s Code!! 👨‍💻👨‍💻');
        // check production
        if (env('APP_ENV') == 'production') {
            $this->call('schedule:run');
            // optimize stuff
            $this->call('route:cache');
            $this->call('config:cache');
            $this->call('view:cache');
        }
        // $this->call('schedule:run');
        $this->call('serve');

    }
}
