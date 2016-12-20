<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CentralCondo\Entities\Portal\User\UserRole::class)->create([
            'name' => 'Usuário',
            'active' => 'y'
        ]);
    }
}
