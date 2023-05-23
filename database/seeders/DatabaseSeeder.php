<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        
        $products = [
            ['name' => 'Яблоки', 'description' => 'Яблоки Гольден весовые, 500 г', 'price' => 20, 'created_at' => now()->subHours(1)],
            ['name' => 'Груши Санта Мария', 'description' => 'Страна производства: Турция', 'price' => 5, 'created_at' => now()->subHours(2)],
            ['name' => 'Картофель', 'description' => 'Чищеный', 'price' => 15, 'created_at' => now()->subHours(3)], 
            ['name' => 'Молоко EkoNiva пастеризованное', 'description' => 'Пастеризованное молоко «ЭкоНива» 2,5 % изготавливается из натурального молока высшего сорта с наших собственных ферм.', 'price' => 100, 'created_at' => now()->subHours(4) ],
            ['name' => 'Ветчина АШАН Красная птица крылатская', 'description' => 'Ветчина «Крылатская» АШАН Красная птица – ароматная закуска из свинины. При производстве используется только свежее мясо. ', 'price' => 150],
            ['name' => 'Сыр плавленый Viola', 'description' => 'содержит ферментный препарат животного происхождения – лизоцим (продукт переработки яиц)), вода питьевая, масло сливочное, сухое обез-жиренное молоко, молочный белок, эмульгаторы (Е331iii, Е452i, Е340ii, Е339iii),', 'price' => 50, 'created_at' => now()->subHours(1)],
            ['name' => 'Хлеб Геркулес «Хлебный Дом» ', 'description' => 'мука пшеничная хлебопекарная первого сорта, вода питьевая, смесь зерновая (хлопья кукурузы, хлопья овсяные', 'price' => 30, 'created_at' => now()->subHours(2)],
            ['name' => 'Чипсы картофельные Lays со вкусом сметаны и лука', 'description' => 'Вкус свежей деревенской сметаны и аромат молодого зеленого лучка', 'price' => 200, 'created_at' => now()->subHours(3)],
            ['name' => 'Мороженое «Вологодский Пломбир»', 'description' => 'пломбир: молоко коровье цельное, масло сливочное, молоко цельное сгущённое с сахаром', 'price' => 50, 'created_at' => now()->subHours(4)],
            ['name' => 'Огурцы короткоплодные', 'description' => 'мытые', 'price' => 70, 'created_at' => now()->subHours(1)],
            ['name' => 'Персики', 'description' => 'Страна производства	Турция', 'price' => 20, 'created_at' => now()->subHours(2)],
            ['name' => 'Слива синяя', 'description' => 'Страна производства Россия', 'price' => 200, 'created_at' => now()->subHours(2)],
        ];
        
         foreach ($products as $productData) {
            \App\Models\Products::create($productData);
        }
      
    }
}

