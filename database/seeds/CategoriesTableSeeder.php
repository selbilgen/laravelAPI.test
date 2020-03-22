<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //DB::table('categories')->truncate();
        Category::truncate();

        for ($i = 0; $i < 30; $i++) {
            $categoryName = rtrim($faker->sentence(1), '.');
            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);
        }

        DB::table('product_categories')->insert(['product_id' => 1, 'category_id' => 1]);
        DB::table('product_categories')->insert(['product_id' => 1, 'category_id' => 2]);
        DB::table('product_categories')->insert(['product_id' => 2, 'category_id' => 1]);
        DB::table('product_categories')->insert(['product_id' => 2, 'category_id' => 2]);
        DB::table('product_categories')->insert(['product_id' => 2, 'category_id' => 3]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
