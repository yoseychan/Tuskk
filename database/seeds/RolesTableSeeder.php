<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'admin', 'label' => 'Administrator']);
        Role::create(['name' => 'author', 'label' => 'Author']);
        Role::create(['name' => 'user', 'label' => 'User']);

    }
}
