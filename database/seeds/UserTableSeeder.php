<?php

use Illuminate\Database\Seeder;
use App\User as User;
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make( 'password' )]);
        #TestDummy::times(50)->create('App\User');
    }

}
