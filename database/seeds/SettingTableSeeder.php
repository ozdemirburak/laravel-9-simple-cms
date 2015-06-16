<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->delete();
        Setting::create(['email' => 'me@example.com', 'facebook' => 'http://facebook.com/myProfile', 'twitter' => 'http://twitter.com/myProfile']);
    }

}