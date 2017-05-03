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
        // $this->call(UsersTableSeeder::class);
        DB::statement("SET foreign_key_checks = 0");
        $this->call(ProdutoTableSeeder::class);
        $this->call(PromocaoTableSeeder::class);
        $this->call(ItensPromocaoTableSeeder ::class);

    }
}
