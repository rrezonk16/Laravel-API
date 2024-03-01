<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $businessmanRole = Role::create(['name' => 'businessman']);
        $userRole = Role::create(['name' => 'user']);

        // User with 'admin' role
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);
        $user1->assignRole($adminRole);

        // User with 'businessman' role
        $user2 = User::create([
            'name' => 'Biznes',
            'email' => 'biznes@example.com',
            'password' => Hash::make('biznes123'),
        ]);
        $user2->assignRole($businessmanRole);

        // User with 'user' role
        $user3 = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
        ]);
        $user3->assignRole($userRole);
    }
}
