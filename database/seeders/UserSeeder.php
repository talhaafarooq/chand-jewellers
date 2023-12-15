<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::find(1);
        // For Admin User
        $user = new User();
        $user->first_name = "Admin";
        $user->last_name = "User";
        $user->email = "admin@admin.com";
        $user->email_verified_at = now();
        $user->password = 'admin12345';
        $user->remember_token = Str::random(10);
        $user->role = RoleEnum::Admin;
        $user->save();
        $user->assignRole($adminRole);

         // For Admin User
         $user = new User();
         $user->first_name = "Talha";
         $user->last_name = "Farooq";
         $user->email = "talhafarooq522446@gmail.com";
         $user->email_verified_at = now();
         $user->password = '12345678';
         $user->remember_token = Str::random(10);
         $user->role = RoleEnum::Admin;
         $user->save();
         $user->assignRole($adminRole);
    }
}
