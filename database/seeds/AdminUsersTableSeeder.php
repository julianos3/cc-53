<?php

use Illuminate\Database\Seeder;
use CentralCondo\Entities\Admin\AdminUsers;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminUsers();
        $user->name = 'Juliano';
        $user->email = "juliano@agencias3.com.br";
        $user->password = crypt("secret", "");
        //$user->role('admin');
        $user->save();
    }
}
