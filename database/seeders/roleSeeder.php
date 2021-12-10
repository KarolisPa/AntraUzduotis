<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Klientas'
        ]);
        DB::table('roles')->insert([
            'name' => 'Svečias'
        ]);
        DB::table('roles')->insert([
            'name' => 'Administratorius',
            'super_user' => '1'
        ]);
        DB::table('roles')->insert([
            'name' => 'Programuotojas',
            'super_user' => '1'
        ]);
    }
}
