<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'Администратор. Имеет доступ ко всем разделам системы'],
            ['name' => 'manager', 'description' => 'Менеджер. Имеет доступ к некоторым разделам системы'],
           ]);
    }
}
