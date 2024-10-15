<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class ArticuloSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('articulo')->insert([
            'idcategoria' => 1,
            'codigo' => '12345',
            'nombre' => 'Producto de Prueba',
            'descripcion' => 'Descripción del producto de prueba',
            'stock' => 50,
            'imagen' => 'imagen.jpg',
            'estado' => 'activo'
        ]);
    }
}
