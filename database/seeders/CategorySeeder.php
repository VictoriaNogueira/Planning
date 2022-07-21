<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path("data/categories.json"));
        $categories = json_decode($json);

        foreach($categories->categories as $key => $value) {
            Category::create([
                "name" => $value->name
            ]);
        }
    }
}
