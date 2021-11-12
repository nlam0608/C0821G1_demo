<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Điện thoại';
        $category->save();

        $category = new Category();
        $category->name = 'Máy tính';
        $category->save();

        $category = new Category();
        $category->name = 'Phụ kiện';
        $category->save();
    }
}
