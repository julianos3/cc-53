<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Portal\Communication\Called\CalledCategory;

class CalledCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CalledCategory::class)->create([
            'name' => 'Reclamação',
            'active' => 'y'
        ]);

        factory(CalledCategory::class)->create([
            'name' => 'Sujestão',
            'active' => 'y'
        ]);

        factory(CalledCategory::class)->create([
            'name' => 'Dúvidas',
            'active' => 'y'
        ]);

        factory(CalledCategory::class)->create([
            'name' => 'Manutenção',
            'active' => 'y'
        ]);
    }
}
