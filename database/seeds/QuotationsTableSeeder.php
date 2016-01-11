<?php

use Illuminate\Database\Seeder;

class QuotationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Quotation\Quotation',10)->create();
    }
}
