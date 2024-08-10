<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rols')->insert([
            'name' => 'Administrativo',
        ]);
        DB::table('rols')->insert([
            'name' => 'Empleado',
        ]);
        DB::table('status')->insert([
            'name' => 'Disponible',
        ]);
        DB::table('status')->insert([
            'name' => 'Agotado',
        ]);
        DB::table('status')->insert([
            'name' => 'En uso',
        ]);
        DB::table('crossbars')->insert([
            'name' => '1',
        ]);
        DB::table('racks')->insert([
            'name' => 'A',
        ]);
        DB::table('crossbars')->insert([
            'name' => '2',
        ]);
        DB::table('racks')->insert([
            'name' => 'B',
        ]);


        \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'a@a.com',
            'password' => Hash::make('12345678'),
            'rol_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'empleado',
            'email' => 'b@b.com',
            'password' => Hash::make('12345678'),
            'rol_id' => '2',
        ]);
        DB::table('categories')->insert([
            'name' => 'Plomería',
        ]);
        DB::table('categories')->insert([
            'name' => 'Electrícidad',
        ]);
        DB::table('categories')->insert([
            'name' => 'General',
        ]);






        \App\Models\Product::factory(10)->create();
    }
}
