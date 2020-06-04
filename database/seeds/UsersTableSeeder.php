<?php

use App\Models\Profile;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate random users.
        factory(User::class, 10)->create()->each(function ($user) {
            $user->profile()->save(factory(Profile::class)->make());
        });
    }
}
