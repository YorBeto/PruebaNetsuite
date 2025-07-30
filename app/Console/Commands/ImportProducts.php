<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class ImportProducts extends Command
{
    protected $signature = 'import:products';
    protected $description = 'Simula la importación de 30,000 productos';

    public function handle()
    {
        $this->info('Iniciando simulación de importación...');

        $batchSize = 400; // insertamos 1000 por vez para no saturar memoria
        $total = 1000;

        $products = [];

        for ($i = 1; $i <= $total; $i++) {
            $products[] = [
    'name' => "Producto Simulado $i",
    'sku' => "SKU$i",
    'price' => number_format(rand(10, 1000) / 10, 2, '.', ''), // <-- aquí
    'created_at' => now(),
    'updated_at' => now(),
];


            // Insertar por lotes
            if ($i % $batchSize == 0) {
                Product::insert($products);
                $products = []; // reset
                $this->info("Insertados $i productos...");
            }
        }

        // Insertar los que faltaron
        if (count($products) > 0) {
            Product::insert($products);
            $this->info("Insertados $total productos en total.");
        }

        $this->info('Importación simulada finalizada.');
        return 0;
    }
}
