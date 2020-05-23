<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 10; $i++) {
            $item = new Item();
            $item->fill([
                'title' => $faker->company,
                'description' => $faker->text(3000),
                'price' => $faker->numberBetween(0, 20000),
                'image_url' => 'https://placekitten.com/640/360',
                'count' => $faker->numberBetween(0, 400),
            ]);
            $item->save();
        }
    }
}
