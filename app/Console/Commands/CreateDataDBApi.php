<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\JsonResponse;

class CreateDataDBApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create data API for DataBase';

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
        $film = \App\Facades\Film::store();
        $people = \App\Facades\People::store();

        return $this->warn($film['status'] . " \n" . $people['status'] );
    }
}
