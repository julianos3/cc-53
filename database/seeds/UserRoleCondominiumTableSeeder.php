<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserRoleCondominium;

class UserRoleCondominiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserRoleCondominium::class)->create([
            'name' => 'Síndico',
            'active' => 'y',
            'admin' => 'y'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Subsíndico',
            'active' => 'y',
            'admin' => 'y'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Síndico Profissional',
            'active' => 'y',
            'admin' => 'y'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Proprietário Morador',
            'active' => 'y',
            'admin' => 'n'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Proprietário não Morador',
            'active' => 'y',
            'admin' => 'n'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Inquilino',
            'active' => 'y',
            'admin' => 'n'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Administradora de Condomínio',
            'active' => 'y',
            'admin' => 'y'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Funcionário do Condomínio',
            'active' => 'y',
            'admin' => 'n'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Gerente do Condomínio',
            'active' => 'y',
            'admin' => 'y'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Imobiliária',
            'active' => 'y',
            'admin' => 'y'
        ]);

        factory(UserRoleCondominium::class)->create([
            'name' => 'Conselho Fiscal',
            'active' => 'y',
            'admin' => 'y'
        ]);
    }
}
