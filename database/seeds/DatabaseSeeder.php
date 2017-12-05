<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // regenerate the list of all classes.
        exec('php composer dump-auto');

        // delete all tables
        $arrTables = DB::select('SHOW TABLES');
        if (!empty($arrTables)) {
            foreach ($arrTables as $table) {
                DB::table($table->{'Tables_in_' . env('DB_DATABASE')})->delete();
            }
        }

        // import a DB dump
        $this->command->info('Run command mysql -h' . env('DB_HOST') . ' -P' . env('DB_PORT') . ' -u' . env('DB_USERNAME') . ' -p' . env('DB_PASSWORD') . ' ' . env('DB_DATABASE') . ' < ' . database_path() . '/' . env('DB_DATABASE') . '.sql');
        exec('mysql -h' . env('DB_HOST') . ' -P' . env('DB_PORT') . ' -u' . env('DB_USERNAME') . ' -p' . env('DB_PASSWORD') . ' ' . env('DB_DATABASE') . ' < ' . database_path() . '/' . env('DB_DATABASE') . '.sql');
        $this->command->info('Load new DB version successful!');

        // Find and run all seeders
        $classes = require base_path() . '/vendor/composer/autoload_classmap.php';
        foreach ($classes as $class) {
            if (strpos($class, 'TableSeeder') !== false) {
                $seederClass = substr(last(explode('/', $class)), 0, -4);
                $this->call($seederClass);
            }
        }

        $this->command->info('Time execute: ' . (microtime(true) - LARAVEL_START) . ' seconds.');
        $this->command->info('Seeding database done!');
    }
}
