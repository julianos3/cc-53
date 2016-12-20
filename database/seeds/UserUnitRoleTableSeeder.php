
<?php

use CentralCondo\Entities\Portal\Condominium\Unit\UserUnitRole;
use Illuminate\Database\Seeder;

class UserUnitRoleTableSeeder extends Seeder
{

    public function run()
    {

        factory(UserUnitRole::class)->create([
            'name' => 'Proprietário',
            'active' => 'y'
        ]);

        factory(UserUnitRole::class)->create([
            'name' => 'Funcionário',
            'active' => 'y'
        ]);

        factory(UserUnitRole::class)->create([
            'name' => 'Inquilino',
            'active' => 'y'
        ]);

        factory(UserUnitRole::class)->create([
            'name' => 'Não informado',
            'active' => 'y'
        ]);

        factory(UserUnitRole::class)->create([
            'name' => 'Procurador',
            'active' => 'y'
        ]);
    }

}