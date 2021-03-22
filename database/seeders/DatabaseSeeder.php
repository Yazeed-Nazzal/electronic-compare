<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $admin = Role::create(['name'=>'admin']);
      $user  = Role::create(['name'=>'user']);
      $userA =  User::factory()->admin()->create();
      $userU =  User::factory()->user()->create();
      $userA->attachRole($admin);
      $userU->attachRole($user);

    }
}
