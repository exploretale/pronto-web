<?php

use Illuminate\Database\Seeder;
use UHack\Pronto\Merchant;
use UHack\Pronto\User;

class MerchantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchants = [
            // Mister Donut
            [
                'zomato_id' => 6317166,
                'email' => 'dunkindonuts@mail.com',
                'name' => 'Dunkin’ Donuts',
                'url' => 'https://www.zomato.com/manila/dunkin-donuts-quiapo-manila?utm_source=api_basic_user&utm_medium=api&utm_campaign=v2.1',
                'image' => 'https://b.zmtcdn.com/data/res_imagery/6300388_CHAIN_0f7d4cc57913c8fd73b5d4e4cc021dc7.jpg?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A',
                'address' => 'Second Floor, Isetann Mall, C. M. Recto Avenue, Quiapo, Manila',
                'products' => [
                    [
                        'name' => 'Classic 12',
                        'image' => 'https://i.imgur.com/4ewYv4F.jpg',
                        'description' => '6 Choco Cakes + 6 Bavarians',
                        'price' => 165.00,
                    ],
                    [
                        'name' => 'All Bavarian 12',
                        'image' => 'https://i.imgur.com/pz8ePyI.jpg',
                        'description' => '6 Bavarians + 6 Bavarian Doubles',
                        'price' => 185.00,
                    ],
                    [
                        'name' => 'All-Time Favorite 15',
                        'image' => 'https://i.imgur.com/JrCUFde.jpg',
                        'description' => '5 Choco Cakes + 5 Bavarians + 5 Bavarian Doubles',
                        'price' => 210.00,
                    ],
                ]
            ],

            // Pizza Hut
            [
                'zomato_id' => 6310374,
                'email' => 'pizzahut@mail.com',
                'name' => 'Pizza Hut',
                'url' => 'https://www.zomato.com/manila/pizza-hut-quiapo-manila?utm_source=api_basic_user&utm_medium=api&utm_campaign=v2.1',
                'image' => 'https://b.zmtcdn.com/data/res_imagery/6300475_CHAIN_87e7c576d6041d463dfc17d2201624c2.jpg?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A',
                'address' => 'Ground Floor, Jose Lim Realty Building, 1916 C. M. Recto Avenue, Quiapo, Manila',
                'products' => [
                    [
                        'name' => 'Personal 6" Pan Pizza',
                        'image' => '',
                        'description' => '6" Pan Pizza - Favorite',
                        'price' => 89.00,
                    ],
                    [
                        'name' => 'Regular 9" Pan Pizza',
                        'image' => '',
                        'description' => '9" Pan Pizza - Favorite',
                        'price' => 219.00,
                    ],
                    [
                        'name' => 'Regular 9" Stuffed Crust',
                        'image' => '',
                        'description' => '9" Stuffed Crust - Favorite',
                        'price' => 329.00,
                    ],
                    [
                        'name' => 'Regular 9" Hand Stretched',
                        'image' => '',
                        'description' => '9" Hand Stretched - Favorite',
                        'price' => 219.00,
                    ],
                    [
                        'name' => 'Large 12" Pan Pizza',
                        'image' => '',
                        'description' => '12" Pan Pizza - Favorite',
                        'price' => 389.00,
                    ],
                    [
                        'name' => 'Large 12" Stuffed Crust',
                        'image' => '',
                        'description' => '12" Stuffed Crust - Favorite',
                        'price' => 539.00,
                    ],
                    [
                        'name' => 'Large 12" Hand Stretched',
                        'image' => '',
                        'description' => '12" Hand Stretched - Favorite',
                        'price' => 389.00,
                    ],
                    [
                        'name' => 'Extra Large 18" Hand Stretched',
                        'image' => '',
                        'description' => '18" Hand Stretched - Favorite',
                        'price' => 549.00,
                    ],
                ]
            ],

            // The Old Spaghetti House
            [
                'zomato_id' => 6303023,
                'email' => 'tosh@mail.com',
                'name' => 'The Old Spaghetti House',
                'url' => 'https://www.zomato.com/manila/the-old-spaghetti-house-ermita-manila?utm_source=api_basic_user&utm_medium=api&utm_campaign=v2.1',
                'image' => 'https://b.zmtcdn.com/data/res_imagery/6300794_CHAIN_2ea960fe92f97c16061755b02081da2c.jpg?fit=around%7C200%3A200&crop=200%3A200%3B%2A%2C%2A',
                'address' => 'Fourth Floor, SM City Manila, Ermita, Manila',
                'products' => [
                    [
                        'name' => 'Vietnamese Garlic Spaghetti',
                        'image' => 'https://i.imgur.com/rlGDj3z.jpg',
                        'price' => 98.00,
                    ],
                    [
                        'name' => 'Vietnamese Garlic Spaghetti with Shrimps',
                        'image' => 'https://i.imgur.com/E39NplP.jpg',
                        'price' => 165.00,
                    ],
                    [
                        'name' => 'Pasta Negra',
                        'image' => 'https://i.imgur.com/rlGDj3z.jpg',
                        'price' => 190.00,
                    ],
                    [
                        'name' => 'Pesto',
                        'image' => 'https://i.imgur.com/E39NplP.jpg',
                        'price' => 150.00,
                    ],
                    [
                        'name' => 'Pesto with Grilled Chicken',
                        'image' => 'https://i.imgur.com/w1hQw33.jpg',
                        'price' => 195.00,
                    ],
                    [
                        'name' => 'Classic Lasagna',
                        'image' => 'https://i.imgur.com/E39NplP.jpg',
                        'price' => 190.00,
                    ],
                    [
                        'name' => 'Penne with Grilled Chicken Inasal',
                        'image' => 'https://i.imgur.com/w1hQw33.jpg',
                        'price' => 190.00,
                    ],
                ]
            ],
        ];

        foreach ($merchants as $merchantArray) {
            $merchantArray = collect($merchantArray);

            $user = User::create([
                'email' => $merchantArray['email'],
                'password' => bcrypt('hello123')
            ]);

            $merchant = $user->merchant()->create([
                'zomato_id' => $merchantArray['zomato_id'],
                'name' => $merchantArray['name'],
                'url' => $merchantArray['url'],
                'image' => $merchantArray['image'],
                'address' => $merchantArray['address'],
            ]);

            foreach ($merchantArray['products'] as $product) {
                $merchant->products()->create($product);
            }
        }
    }
}
