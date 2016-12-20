<?php

use CentralCondo\Entities\Portal\Condominium\Provider\ProviderCategory;
use Illuminate\Database\Seeder;

class ProviderCategoryTableSeeder extends Seeder
{

    public function run()
    {

        factory(ProviderCategory::class)->create([
            'name' => 'Eletricista',
            'active' => 'y'
        ]);

        factory(ProviderCategory::class)->create([
            'name' => 'Bombeiros',
            'active' => 'y'
        ]);

        factory(ProviderCategory::class)->create([
            'name' => 'Pedreiro',
            'active' => 'y'
        ]);

        factory(ProviderCategory::class)->create([
            'name' => 'Faxineira',
            'active' => 'y'
        ]);

        factory(ProviderCategory::class)->create([
            'name' => 'Manutenção',
            'active' => 'y'
        ]);

    }

}