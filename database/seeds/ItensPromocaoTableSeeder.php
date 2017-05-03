<?php

use Illuminate\Database\Seeder;

class ItensPromocaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \viewjs\Entities\ItensPromocao::truncate();
        factory(\viewjs\Entities\ItensPromocao::class, 100)->create();
    }
}
