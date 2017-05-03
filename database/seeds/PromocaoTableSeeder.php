<?php

use Illuminate\Database\Seeder;

class PromocaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \viewjs\Entities\Promocao::truncate();
        factory(\viewjs\Entities\Promocao::class, 3)->create();
    }
}
