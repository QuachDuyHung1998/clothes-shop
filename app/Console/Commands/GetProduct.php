<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get products for project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->info('The command was successful!');
        } catch (\Throwable $th) {
            //throw $th;
        }
        return 0;
    }
}