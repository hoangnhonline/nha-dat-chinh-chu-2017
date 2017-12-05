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

        // Find and run all seeders
        $classes = require base_path() . '/vendor/composer/autoload_classmap.php';
        foreach ($classes as $class) {
            if (strpos($class, 'TableSeeder') !== false) {
                $seederClass = substr(last(explode('/', $class)), 0, -4);
                $this->call($seederClass);
            }
        }
    }
}
