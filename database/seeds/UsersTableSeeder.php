<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //just to ensure that default admin and the operator are registered before everything takes on effect.
        $user = Sentinel::registerAndActivate([
            "email" => "admin@gmail.com",
            "first_name" => "Admin",
            "last_name" => "Agrovet",
            "password" => "secret",
        ]);

        $role = Sentinel::findRoleBySlug('admin');

        $role->users()->attach($user);

        $user = Sentinel::registerAndActivate([
            "email" => "operator@gmail.com",
            "first_name" => "Operator",
            "last_name" => "Agrovet",
            "password" => "secret",
        ]);

        $role = Sentinel::findRoleBySlug('operator');

        $role->users()->attach($user);
    }
}
