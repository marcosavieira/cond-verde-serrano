<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class CreateDB extends Command
{
    protected $signature = 'create:db';

    protected $description = 'Criação da database e execução do script SQL';

    public function handle()
    {
        $this->createDatabase();
        $this->executeSQLScript('db_verde_serrano.sql');
        $this->info('Database criada com sucesso!!!');
    }

    private function createDatabase()
    {
        $dbName = 'db_verde_serrano';
        config(['database.connections.mysql.database' => null]); // Reset the database name
        DB::statement("CREATE DATABASE IF NOT EXISTS $dbName");
        config(['database.connections.mysql.database' => $dbName]); // Set the new database name
    }

    private function executeSQLScript($scriptName)
    {
        $sql = File::get(database_path("sql/$scriptName"));
        DB::unprepared($sql);
    }
}
