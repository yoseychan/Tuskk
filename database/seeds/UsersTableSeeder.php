<?php

use App\User;
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
        User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin1234'), 'role_id' => '1']);

        factory(User::class, 5)->create();
    }
}
