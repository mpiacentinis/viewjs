<?php

use Illuminate\Database\Seeder;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \viewjs\Entities\Produto::truncate();
        factory(\viewjs\Entities\Produto::class, 30)->create();
    }
}
