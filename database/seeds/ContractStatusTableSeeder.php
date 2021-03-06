<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Portal\Manage\Contract\ContractStatus;

class ContractStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContractStatus::class)->create([
            'name' => 'Vigente',
            'active' => 'y'
        ]);

        factory(ContractStatus::class)->create([
            'name' => 'Rescindido',
            'active' => 'y'
        ]);

        factory(ContractStatus::class)->create([
            'name' => 'Finalizado',
            'active' => 'y'
        ]);
    }
}
