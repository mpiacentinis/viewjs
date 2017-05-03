<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensPromocaosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itens_promocaos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('promocao_id')->unsigned();
            $table->foreign('promocao_id')->references('id')->on('promocaos');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->decimal('valor',8);
            $table->decimal('valorPromocao',8);
            $table->decimal('quantMaxCliente',4);
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('itens_promocaos');
	}

}
