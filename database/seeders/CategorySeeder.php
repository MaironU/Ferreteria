<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->category = 'Ferretería';
        $category->save();

        $category = new Category();
        $category->category = 'Repuestos de Moto';
        $category->save();

        $category = new Category();
        $category->category = 'Repuestos de Bicicletas';
        $category->save();
    }
}
