<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Tintuc;
use App\Models\TintucProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Category::factory(15)->create();
        // Product::factory(10)->create();
        // CategoryProduct::factory(10)->create();
        Tintuc::factory(15)->create();
        // TintucProduct::factory(15)->create();

    }
}
