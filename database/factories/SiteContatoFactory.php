<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'motivo_contato' => $faker->numberBetween($min = 1, $max = 3),
        'mensagem' => $faker->text(200)
    ];
});
