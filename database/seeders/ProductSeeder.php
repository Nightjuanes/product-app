<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['Tipo' => 'entradas', 'name' => 'Pastelillo', 'imagen' => 'pastelitos-venezolanos-4fp.jpg', 'descripcion' => 'Pastelitos andinos rellenos de carne o queso', 'precio' => 10000.00],
            ['Tipo' => 'entradas', 'name' => 'PATACONES', 'imagen' => 'R.b6fcfa270ff68ff377dee94100b9ebbf.jpeg', 'descripcion' => 'Patacones con suero costeño y hogado', 'precio' => 15000.00],
            ['Tipo' => 'entradas', 'name' => 'Tequeños', 'imagen' => 'R.a8738e1d810d8a105c81db7f79cb9b3e.jpeg', 'descripcion' => 'Tequeños rellenos con queso salado, acompañados con salsa tartara', 'precio' => 15000.00],
            ['Tipo' => 'entradas', 'name' => 'Chicharron', 'imagen' => 'chicharron.jpg', 'descripcion' => 'Chicharrones acompañados de Yuca o bollo limpio', 'precio' => 15000.00],
            ['Tipo' => 'platos', 'name' => 'Arepa de posta cartagenera', 'imagen' => 'R.e2c7c77dfa94f5a95cd6116639b31fb9.jpeg', 'descripcion' => 'Arepa rellena de punta de nalga de res, bañada en salsa dulce y acompañada con platanos', 'precio' => 20000.00],
            ['Tipo' => 'platos', 'name' => 'Arepa de pabellon criollo', 'imagen' => 'R.681cf75172ef60d9358e29295fe54f1c.jpeg', 'descripcion' => 'Arepa rellena de carne mechada, caraotas, platano y queso amarillo', 'precio' => 20000.00],
            ['Tipo' => 'platos', 'name' => 'Empanada de ceviche', 'imagen' => 'empanadas-venezolanas-1-e1592960734638.jpg', 'descripcion' => 'Empanada frita rellena de ceviche', 'precio' => 20000.00],
            ['Tipo' => 'platos', 'name' => 'Empanada catira', 'imagen' => 'OIP.5PCeeOBFWnI8iYfZCY1CAwHaE8.jpeg', 'descripcion' => 'Empanada frita rellena de pollo mechado y queso blanco', 'precio' => 20000.00],
            ['Tipo' => 'bebidas', 'name' => 'Jugo natural', 'imagen' => 'OIP.G2S72j2shjhGHJGd-whJOwHaEk.jpeg', 'descripcion' => 'Jugos naturales en agua o leche de: mango, fresa, maracuya, lulo, piña, mora, corozo, curuba', 'precio' => 7000.00],
            ['Tipo' => 'bebidas', 'name' => 'Limonada', 'imagen' => 'OIP.M2avDHRxvSxhgndoI3I4PQHaE8.jpeg', 'descripcion' => 'Limonada natura, hierbabuena, coco, cereza', 'precio' => 7000.00],
            ['Tipo' => 'bebidas', 'name' => 'Agua', 'imagen' => '00750103240194L.jpg', 'descripcion' => 'Agua con gas o sin gas', 'precio' => 7000.00],
            ['Tipo' => 'bebidas', 'name' => 'Gaseosa', 'imagen' => 'R.c7b22b579dc38fc867b87052f9625f64.png', 'descripcion' => 'Gaseosas postobon', 'precio' => 7000.00],
            ['Tipo' => 'postres', 'name' => 'Quesillo', 'imagen' => 'OIP.VWtYMB6Q5WUdyRlJGCqSkQHaDn.jpeg', 'descripcion' => 'Quesillo con topping de leche condensada', 'precio' => 10000.00],
            ['Tipo' => 'postres', 'name' => 'Muñequitos de arequipe', 'imagen' => 'WhatsApp Image 2024-02-21 at 22.36.46.jpeg', 'descripcion' => 'Quesillo con topping de leche condensada', 'precio' => 10000.00],
            ['Tipo' => 'postres', 'name' => 'Cocada', 'imagen' => 'R.11590dc7065cb07e9b8ec7c7a38a7ad9.jpeg', 'descripcion' => 'Bolitas de coco con leche condensada', 'precio' => 10000.00],
            ['Tipo' => 'postres', 'name' => 'Marquesa', 'imagen' => 'OIP.XnTBT0589n8LYw1y8nHFKQHaFj.jpeg', 'descripcion' => 'Marquesas de chocolate, arequipe, oreo, maracuya', 'precio' => 10000.00],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
