<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->login = 'admin';
        $admin->password = Hash::make('admin');

        $role = Role::query()
            ->where('name', Role::ROLE_ADMIN)
            ->first();
        $admin->role()->associate($role);
        $admin->save();


        $manager = new User();
        $manager->login = 'admin';
        $manager->password = Hash::make('admin');

        $role = Role::query()
            ->where('name', Role::ROLE_MANAGER)
            ->first();
        $manager->role()->associate($role);
        $manager->save();

    }
}
