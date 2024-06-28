<?php

namespace Database\Seeders;

use App\Models\CategoriaProducto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'IMPRESORAS',
                'descripcion' => 'Impresoras de inyección y láser',
            ],
            [
                'nombre' => 'ACCESORIOS DE COMPUTO',
                'descripcion' => 'Teclados, ratones, monitores y otros periféricos',
            ],
            [
                'nombre' => 'COMPUTADORES',
                'descripcion' => 'Computadoras de escritorio y portátiles',
            ],
            [
                'nombre' => 'INSUMOS',
                'descripcion' => 'Cartuchos de tinta, tóner y papel'
            ],
            [
                'nombre' => 'REPUESTOS',
                'descripcion' => 'Repuestos de impresoras y equipos'
            ]
        ];

        foreach ($categorias as $key => $value) {
            CategoriaProducto::create($value);
        }
    }
}
