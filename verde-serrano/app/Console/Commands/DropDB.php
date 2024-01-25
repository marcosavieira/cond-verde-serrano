<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class DropDB extends Command
{
    protected $signature = 'run:drop-db';

    protected $description = 'Run SQL script to drop table';

    public function handle()
    {
        $sql = file_get_contents(database_path('sql/db_verde_serrano_down.sql'));
        DB::unprepared($sql);
        $this->info('DB removido com sucesso.');
    }
}
