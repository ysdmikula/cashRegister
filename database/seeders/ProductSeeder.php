<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "Kuřecí hamburger s oblohou",
            "price" => 45
        ]);
        Product::create([
            "name" => "Kuřecí cheese burger",
            "price" => 55
        ]);
        Product::create([
            "name" => "Kuřecí big burger",
            "price" => 70
        ]);
        Product::create([
            "name" => "Kuřecí smažák burger",
            "price" => 75
        ]);
        Product::create([
            "name" => "Hovězí hamburger s oblohou",
            "price" => 70
        ]);
        Product::create([
            "name" => "Hovězí cheese burger",
            "price" => 80
        ]);
        Product::create([
            "name" => "Hovězí big burger",
            "price" => 110
        ]);
        Product::create([
            "name" => "Hovězí smažák burger",
            "price" => 130
        ]);
        Product::create([
            "name" => "Smažák v housce",
            "price" => 60
        ]);
        Product::create([
            "name" => "Big smažák v housce",
            "price" => 85
        ]);
        Product::create([
            "name" => "Hermelín v housce",
            "price" => 70
        ]);
        Product::create([
            "name" => "Kuřecí Holandský řízek v housce",
            "price" => 70
        ]);
        Product::create([
            "name" => "Kuřecí nugety v housce",
            "price" => 65
        ]);
        Product::create([
            "name" => "Kuřecí řízek v housce",
            "price" => 80
        ]);
        Product::create([
            "name" => "Klobása v housce",
            "price" => 70
        ]);
        Product::create([
            "name" => "Rybí filé v housce",
            "price" => 70
        ]);
        Product::create([
            "name" => "Kuřecí řízek",
            "price" => 120
        ]);
        Product::create([
            "name" => "Závitek v housce",
            "price" => 50
        ]);
        Product::create([
            "name" => "Hranolky",
            "price" => 45
        ]);
        Product::create([
            "name" => "Krokety",
            "price" => 50
        ]);
        Product::create([
            "name" => "Americké brambory",
            "price" => 50
        ]);
        Product::create([
            "name" => "Sm. cibulové kroužky",
            "price" => 70
        ]);
        Product::create([
            "name" => "Sm. Květák",
            "price" => 70
        ]);
        Product::create([
            "name" => "Bramborové tyčinky se sýrem",
            "price" => 60
        ]);
        Product::create([
            "name" => "Kuřecí stripsy",
            "price" => 70
        ]);
        Product::create([
            "name" => "Vegan závitky",
            "price" => 60
        ]);
        Product::create([
            "name" => "Jarní závitek",
            "price" => 25
        ]);
        Product::create([
            "name" => "Párek v rohlíku",
            "price" => 25
        ]);
        Product::create([
            "name" => "Sm. Sýr + Krokety",
            "price" => 110
        ]);
        Product::create([
            "name" => "Sm. Sýr + Hranolky",
            "price" => 110
        ]);
        Product::create([
            "name" => "Hermelín + Hranolky",
            "price" => 110
        ]);
        Product::create([
            "name" => "Sm. Nugety + Hranolky",
            "price" => 110
        ]);
        Product::create([
            "name" => "Kuř. Holandský řízek + Hranolky",
            "price" => 110
        ]);
        Product::create([
            "name" => "Kuř. řízek + Hranolky",
            "price" => 120
        ]);        
        Product::create([
            "name" => "Sm. Filé + Hranolky",
            "price" => 110
        ]); 
        Product::create([
            "name" => "Klobása",
            "price" => 60
        ]); 
        Product::create([
            "id" => 0,
            "name" => "Ostatní",
            "price" => 0
        ]); 
        Product::create([
            "name" => "Zabalit",
            "price" => 5
        ]); 
        Product::create([
            "name" => "Nápoj",
            "price" => 0
        ]); 

    }
}
