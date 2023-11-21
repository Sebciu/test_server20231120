<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StartTestEnvironment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start-test-environment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create basic database';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $this->line('====================================================================');
        $this->line('Executing migrate:fresh, please wait...');
        Artisan::call('migrate:fresh');
        $this->output->success('Fresh migration created successfully!');
        $this->line('====================================================================');
        $this->line('creating example Companies and Food Preferences, please wait...');
        Artisan::call('db:seed --class=CompaniesAndDietaryPreferencesSeeder');
        $this->output->success('Dietary Preferences and Companies created successfully!');
    }
}
