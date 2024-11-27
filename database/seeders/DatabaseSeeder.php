<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Aquí registras todos los seeders que quieras ejecutar
        $this->call([
            UsersTableSeeder::class,
            // Agrega aquí otros seeders que tengas
        ]);
    }
}
