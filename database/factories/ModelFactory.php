<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(viewjs\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\viewjs\Entities\Produto::class, function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'codeBar'   => $faker->ean13,
        'und'       => $faker->randomElement($array = array ('UND','PCT','LTS','DUZ')),
        'preco'     => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
        'promocao'  => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 400),
        'imagem'    => $faker->imageUrl($width = 640, $height = 480),

    ];
});

$factory->define(\viewjs\Entities\Promocao::class, function (Faker\Generator $faker) {
    return [
        'descricao' => $faker->sentence,
        'inicio'    => $faker->dateTime,
        'final'     => $faker->dateTime,
    ];
});


 $factory->define(viewjs\Entities\ItensPromocao::class, function (Faker\Generator $faker) {
    return [
        'promocao_id'       => $faker->numberBetween($min = 1, $max = 3),
        'produto_id'        => $faker->numberBetween($min = 1, $max = 30),
        'valor'             => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
        'valorPromocao'     => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 400),
        'quantMaxCliente'   => $faker->numberBetween($min = 1, $max = 10),

    ];

});
