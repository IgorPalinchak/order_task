<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 'real_user', 1)->create()->each(function ($user) {
        });

        factory(App\User::class, 'default', 4)->create()->each(function ($user) {
        });

    }
}
