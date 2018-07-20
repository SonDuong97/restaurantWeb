<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // 
        // $this->call(categorySeeder::class);
        // $this->call(eatingSeeder::class);
        // $this->call(settingSeeder::class);
        $this->call(userSeeder::class);
    }
}

/**
 * Seed the category table's sample data
 */
class categorySeeder extends Seeder
{
	public function run()
	{
		DB::table('category')->insert([
			['categoryName' => 'Appetisers'], 
			['categoryName' => 'Starters'], 
			['categoryName' => 'Salads'], 
			['categoryName' => 'Main Dishes']
		]);
	}
}

// Seed the eating table's sample date
// 
class eatingSeeder extends Seeder
{
	public function run()
	{
		DB::table('eating')->insert([
			['eatingName' => 'Tzatsiki', 'id_category' => 1, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 3.99],
			['eatingName' => 'Aubergine_Salad', 'id_category' => 1, 'description' => 'Pureed eggplant, garlic, green pepper and tomato dip.', 'cost' => 5.50],
			['eatingName' => 'Aubergine_Salad', 'id_category' => 1, 'description' => 'Pureed eggplant, garlic, green pepper and tomato dip.', 'cost' => 5.25],
			['eatingName' => 'Haloumi', 'id_category' => 2, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 3.99],
			['eatingName' => 'Spinach_Pie', 'id_category' => 2, 'description' => 'Pureed eggplant, garlic, green pepper and tomato dip.', 'cost' => 5.50],
			['eatingName' => 'Olive_Special', 'id_category' => 3, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 5.99],
			['eatingName' => 'Cornish_Mackerel', 'id_category' => 4, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 5.99]

		]);
	}
}

// Seed the setting table's sample data
// 
class settingSeeder extends Seeder 
{
	public function run()
	{
		DB::table('setting')->insert([
			['className' => 'header', 'title' => 'the right ingredients for the right food', 'description' => ' '],
			['className' => 'about', 'title' => 'Just the right food', 'description' => 'If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food, delicious Lambda cakes, muffins, and gourmet coffees make us hard to resist! Stop in today and check us out!'],
			['className' => 'ingredients', 'title' => 'Fine ingredients', 'description' => 'If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food, delicious Lambda cakes, muffins, and gourmet coffees make us hard to resist! Stop in today and check us out!'],
			['className' => 'review', 'title' => 'Guest Reviews', 'description' => 'If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food, delicious Lambda cakes, muffins, and gourmet coffees make us hard to resist! Stop in today and check us out!'],
			['className' => 'reservations1', 'title' => 'Just the right food', 'description' => 'If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers coming back for more. Perfect materials and freshly baked food.'],
			['className' => 'reservations2', 'title' => 'Just the right food', 'description' => 'Delicious Lambda cakes, muffins, and gourmet coffees make us hard to resist! Stop in today and check us out! Perfect materials and freshly baked food.']
		]);
	}
}

// Seed the user table's sample data
// 
class userSeeder extends Seeder 
{
	public function run()
	{
		DB::table('users')->insert([
			['name' => 'son', 'email' => 'duongson29111997@gmail.com', 'password' => bcrypt("12345")]
		]);
	}
}