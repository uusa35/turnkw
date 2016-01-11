<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $tables = [
        'users',
        'invoices',
        'quotations'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() == 'local') {
            Model::unguard();
            $this->cleanDatabase();
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            $this->call('UsersTableSeeder');
            $this->call('InvoicesTableSeeder');
            $this->call('QuotationsTableSeeder');
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }

    }

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
