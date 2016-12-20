<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Portal\Communication\Called\CalledStatus;

class CalledStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CalledStatus::class)->create([
            'name' => 'Pendente',
            'active' => 'y'
        ]);

        factory(CalledStatus::class)->create([
            'name' => 'Resolvido',
            'active' => 'y'
        ]);

        factory(CalledStatus::class)->create([
            'name' => 'Cancelado',
            'active' => 'y'
        ]);

        factory(CalledStatus::class)->create([
            'name' => 'Em Andamento',
            'active' => 'y'
        ]);
    }
}
