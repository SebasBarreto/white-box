<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProductoSeeder extends Seeder
{
    public function run()
    {
        // Crear una categoría
        $categoriaId = DB::table('categorias')->insertGetId([
            'nombre' => 'Electrónica',
            'descripcion' => 'Dispositivos electrónicos y accesorios',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear un producto asociado a la categoría
        DB::table('productos')->insert([
            'nombre' => 'Auriculares Bluetooth',
            'descripcion' => 'Auriculares inalámbricos con alta calidad de sonido',
            'precio' => 49.99,
            'categoria_id' => $categoriaId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
