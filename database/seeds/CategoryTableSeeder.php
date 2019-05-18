<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'title' => 'Yazılım Geliştirme'
        ]);

        DB::table('categories')->insert([
            'title' => 'Müzik'
        ]);

        DB::table('categories')->insert([
            'title' => 'Resim'
        ]);
    }
}
