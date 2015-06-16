<?php

use Illuminate\Database\Seeder;
use Laracasts\TestDummy\Factory as TestDummy;
use App\Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->delete();
        TestDummy::times(5)->create('App\Category');
    }

}