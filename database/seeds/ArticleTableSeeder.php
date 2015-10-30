<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->delete();
        factory(App\Article::class, 40)->create();
    }
}
