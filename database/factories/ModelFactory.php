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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'email' => $faker->email,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'api_token' => str_random(60),
        'activated' => 1,
        'role'=> 'admin',
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        
        
        
    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => 10,
        'stock' => 10,
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});


$factory->define(App\Criteria::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        
       
    ];
});

$factory->define(App\Option::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,

        'criteria_id' => function () {
            return factory(App\Criteria::class)->create()->id;
        }
        
       
    ];
});


$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
        'user_id'=>1,
        'sub_total' => 123,
        'total'=>456,
        
        
       
    ];
});





