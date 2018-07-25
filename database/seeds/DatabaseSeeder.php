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
        $this->call(categorySeeder::class);
        $this->call(eatingSeeder::class);
        $this->call(settingSeeder::class);
        $this->call(userSeeder::class);
        $this->call(orderSeeder::class);
        $this->call(eatingOrderSeeder::class);
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
			['eatingName' => 'Tzatsiki', 'category_id' => 1, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 3.99],
			['eatingName' => 'Aubergine_Salad', 'category_id' => 1, 'description' => 'Pureed eggplant, garlic, green pepper and tomato dip.', 'cost' => 5.50],
			['eatingName' => 'Aubergine_Salad', 'category_id' => 1, 'description' => 'Pureed eggplant, garlic, green pepper and tomato dip.', 'cost' => 5.25],
			['eatingName' => 'Haloumi', 'category_id' => 2, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 3.99],
			['eatingName' => 'Spinach_Pie', 'category_id' => 2, 'description' => 'Pureed eggplant, garlic, green pepper and tomato dip.', 'cost' => 5.50],
			['eatingName' => 'Olive_Special', 'category_id' => 3, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 5.99],
			['eatingName' => 'Cornish_Mackerel', 'category_id' => 4, 'description' => 'Refreshing traditional cucumber and garlic yoghurt dip.', 'cost' => 5.99]

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
			['name' => 'son', 'email' => 'son@gmail.com', 'password' => bcrypt("son")],
			['name' => 'trung', 'email' => 'trung@gmail.com', 'password' => bcrypt("trung")], 
			['name' => 'dat', 'email' => 'dat@gmail.com', 'password' => bcrypt("dat")], 
			['name' => 'thuong', 'email' => 'thuong@gmail.com', 'password' => bcrypt("thuong")], 
			['name' => 'hai', 'email' => 'hai@gmail.com', 'password' => bcrypt("hai")],
			['name' => 'Duong Son', 'email' => 'duongson29111997@gmail.com', 'password' => bcrypt("son")]
		]);
	}
}

class orderSeeder extends Seeder
{
	public function run()
	{
		DB::table('order')->insert([
			['user_id' => 1, 'status' => 'Cancelled', 'total_money' => 11.3],
			['user_id' => 1, 'status' => 'Completed', 'total_money' => 1.2]
		]);
	}
}

class eatingOrderSeeder extends Seeder
{
	public function run()
	{
		DB::table('eating_order')->insert([
			['order_id' => 1, 'eating_id' => 1, 'quantity' => 2],
			['order_id' => 1, 'eating_id' => 2, 'quantity' => 3],
			['order_id' => 2, 'eating_id' => 3, 'quantity' => 1],
		]);
	}
}
