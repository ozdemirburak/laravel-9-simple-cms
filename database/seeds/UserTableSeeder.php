<?php

use Illuminate\Database\Seeder;
use App\User as User;

# use Laracasts\TestDummy\Factory as TestDummy;
# To use TestDummy, call in run as -> TestDummy::times(50)->create('App\User');

class UserTableSeeder extends Seeder
{
    /**
     * Run the user database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '123456']);
    }

}
