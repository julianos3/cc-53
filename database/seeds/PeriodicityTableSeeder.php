<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Portal\Manage\Periodicity\Periodicity;
class PeriodicityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Periodicity::class)->create([
            'name' => 'Semanal',
            'active' => 'y'
        ]);

        factory(Periodicity::class)->create([
            'name' => 'Quinzenal',
            'active' => 'y'
        ]);

        factory(Periodicity::class)->create([
            'name' => 'Mensal',
            'active' => 'y'
        ]);

        factory(Periodicity::class)->create([
            'name' => 'Bimestral',
            'active' => 'y'
        ]);

        factory(Periodicity::class)->create([
            'name' => 'Trimestral',
            'active' => 'y'
        ]);

        factory(Periodicity::class)->create([
            'name' => 'Semestral',
            'active' => 'y'
        ]);

        factory(Periodicity::class)->create([
            'name' => 'Anual',
            'active' => 'y'
        ]);
    }
}
