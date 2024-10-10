<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeApplication extends Command
{
    // The name and signature of the console command.
    protected $signature = 'app:optimize';

    // The console command description.
    protected $description = 'Optimize the application by clearing and caching configurations, views, etc.';

    // Execute the console command.
    public function handle()
    {
        $this->info('Caching views...');
        \Artisan::call('view:cache');
        $this->info('Optimizing application...');
        \Artisan::call('optimize');
        $this->info('Application optimization complete.');
    }
}
