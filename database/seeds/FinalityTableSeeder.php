<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Portal\Condominium\Finality\Finality;

class FinalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Finality::class)->create([
            'name' => 'Residencial',
            'active' => 'y'
        ]);

        factory(Finality::class)->create([
            'name' => 'Comercial',
            'active' => 'y'
        ]);

        factory(Finality::class)->create([
            'name' => 'Residencial e Comercial',
            'active' => 'y'
        ]);
    }
}
