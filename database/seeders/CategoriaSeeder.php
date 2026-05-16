<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = [
            ['nombre' => 'Restaurantes', 'icono' => 'fa-solid fa-utensils'],
            ['nombre' => 'Gimnasions', 'icono' => 'fa-solid fa-dumbbell'],
            ['nombre' => 'Cafeterias', 'icono' => 'fa-solid fa-mug-hot'],
            ['nombre' => 'Tiendas', 'icono' => 'fa-solid fa-shop'],
            ['nombre' => 'Talleres Mecanicos', 'icono' => 'fa-solid fa-wrench'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
