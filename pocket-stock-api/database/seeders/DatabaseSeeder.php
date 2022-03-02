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


        DB::table('rols_tbl')->insert([
            'name_rol' => 'Administrativo',
        ]);
        DB::table('rols_tbl')->insert([
            'name_rol' => 'Empleado',
        ]);
        DB::table('status_tbl')->insert([
            'nombre_status' => 'Disponible',
        ]);
        DB::table('status_tbl')->insert([
            'nombre_status' => 'Agotado',
        ]);
        DB::table('status_tbl')->insert([
            'nombre_status' => 'En uso',
        ]);
        DB::table('travesano_tbl')->insert([
            'nombre_travesano' => '1',
        ]);
        DB::table('rack_tbl')->insert([
            'nombre_rack' => 'A',
        ]);
        DB::table('travesano_tbl')->insert([
            'nombre_travesano' => '2',
        ]);
        DB::table('rack_tbl')->insert([
            'nombre_rack' => 'B',
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
        DB::table('categorias_tbl')->insert([
            'nombre_categoria' => 'Plomería',
        ]);
        DB::table('categorias_tbl')->insert([
            'nombre_categoria' => 'Electrícidad',
        ]);
        DB::table('categorias_tbl')->insert([
            'nombre_categoria' => 'General',
        ]);


        DB::table('marcas_tbl')->insert([
            'nombre_marca' => 'Honda',
        ]);
        DB::table('marcas_tbl')->insert([
            'nombre_marca' => 'Yamaha',
        ]);
        DB::table('marcas_tbl')->insert([
            'nombre_marca' => 'Asus',
        ]);


        DB::table('tipos_tbl')->insert([
            'nombre_tipo' => 'Consumible',
        ]);
        DB::table('tipos_tbl')->insert([
            'nombre_tipo' => 'Herramienta',
        ]);
        DB::table('tipos_tbl')->insert([
            'nombre_tipo' => 'General',
        ]);


        DB::table('proveedores_tbl')->insert([
            'nombre_proveedor' => 'Davila',
        ]);
        DB::table('proveedores_tbl')->insert([
            'nombre_proveedor' => 'Ortíz',
        ]);
        DB::table('proveedores_tbl')->insert([
            'nombre_proveedor' => 'Desconocido',
        ]);
        \App\Models\Articulo::factory(10)->create();
    }
}
