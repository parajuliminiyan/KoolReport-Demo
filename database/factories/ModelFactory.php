<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Sales::class, function (Faker\Generator $faker){
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return[
      'Name' => $faker->foodName(),
        'Sales' => $faker->randomNumber(4),
        'Profits' => $faker->randomNumber(4),
        'Costs' => $faker->randomNumber(4)
    ];
});
