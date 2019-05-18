<?php

use Illuminate\Database\Seeder;

class TagsSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
           'title' => 'php'
        ]);
        DB::table('tags')->insert([
            'title' => 'laravel'
        ]);
        DB::table('tags')->insert([
            'title' => 'mysql'
        ]);
        DB::table('tags')->insert([
            'title' => 'sigara'
        ]);
        DB::table('tags')->insert([
            'title' => 'matematik'
        ]);
        DB::table('tags')->insert([
            'title' => 'spor'
        ]);
    }
}
