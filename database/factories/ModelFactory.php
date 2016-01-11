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

$factory->define(App\Src\User\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'role' => $faker->randomElement(['admin', 'user']),
        'password' => Hash::make('admin'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Src\Invoice\Invoice::class, function (Faker\Generator $faker)
{
    return [
        'user_id' => \App\Src\User\User::all()->random()->id,
        'ref' => $faker->randomDigit(1,50) .'-'. date('m-Y'),
        'from' => $faker->name,
        'to' => $faker->name,
        'project' => $faker->word(6),
        'po' => $faker->numberBetween(0, 30),
        'project_date' => $faker->dateTimeThisYear(),
        'project_manager' => $faker->name,
        'payment_method' => $faker->randomElement(['cheque', 'transfer']),
        'due_date' => $faker->dateTimethisYear(),
        'total_no' => $faker->numberBetween(10, 200),
        'total_words' => $faker->word(5),
        'due_now' => $faker->dateTimeThisYear(),
        'notes' => $faker->paragraph(2),
        'signed_by' => $faker->name
    ];

});

$factory->define(App\Src\Quotation\Quotation::class, function (Faker\Generator $faker)
{
    return [
        'user_id' => \App\Src\User\User::all()->random()->id,
        'ref' => $faker->randomDigit(1,50).'-'. date('m-Y'),
        'attention' => $faker->name,
        'client' => $faker->name,
        'project' => $faker->word(3),
        'body' => $faker->paragraph(2),
        'price' => $faker->numberBetween(10, 200),
        'email' => $faker->email
    ];

});


