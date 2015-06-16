<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('languages')->delete();
        Language::create(['title' => 'Türkçe', 'code' => 'tr', 'site_title' => 'Blog', 'site_description' => 'Muhteşem Blogum']);
        Language::create(['title' => 'English', 'code' => 'en', 'site_title' => 'Blog', 'site_description' => 'My awesome Blog']);
    }

}