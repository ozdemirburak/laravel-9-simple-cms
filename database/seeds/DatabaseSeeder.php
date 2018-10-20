<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addUsers();
        $this->addContent();
    }

    /**
     * Add user
     */
    public function addUsers(): void
    {
        \DB::table('users')->delete();
        \App\Models\User::create(['email' => 'admin@admin.com', 'password' => '123456']);
    }

    /**
     * Add some content
     */
    public function addContent(): void
    {
        \DB::table('categories')->delete();
        factory(\App\Models\Category::class, 5)->create();
        \DB::table('articles')->delete();
        factory(\App\Models\Article::class, 40)->create();
        \DB::table('pages')->delete();
        factory(\App\Models\Page::class, 6)->create(['parent_id' => null]);
        foreach (range(4, 5) as $p) {
            factory(\App\Models\Page::class, 2)->create(['parent_id' => $p]);
        }
    }
}
