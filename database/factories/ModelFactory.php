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

$factory->define(CentralCondo\Entities\Portal\User\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CentralCondo\Entities\Portal\User\UserRole::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->word,
        'active' => 's'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Condominium\Condominium\UserRoleCondominium::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->word,
        'active' => 's',
        'admin' => 'n'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Condominium\Finality\Finality::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->word,
        'active' => 's',
    ];
});

$factory->define(CentralCondo\Entities\Portal\Condominium\Block\BlockNomemclature::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'label' => $faker->name,
        'active' => 's',
        'type' => 'l'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Condominium\Unit\UnitType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'label' => $faker->name,
        'active' => 's'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Condominium\Unit\UserUnitRole::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'active' => 's'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Condominium\Provider\ProviderCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'active' => 's'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Manage\Contract\ContractStatus::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'active' => 's'
    ];
});
$factory->define(CentralCondo\Entities\Portal\Manage\Periodicity\Periodicity::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'active' => 's'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Communication\Called\CalledCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'active' => 's'
    ];
});

$factory->define(CentralCondo\Entities\Portal\Communication\Called\CalledStatus::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'active' => 's'
    ];
});

