<?php

use Faker\Generator as Faker;

$factory->define(App\Pauta::class, function (Faker $faker) {
    return [
        'titulo' => $faker->word,
        'descricao' => $faker->sentence,
        'detalhes' => $faker->sentence,
        'autor' => $faker->name,
        'status' => 'ABERTO',
        'user_id' => $faker->numberBetween(1, 2)
    ];
});
