<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    $data=
            [
                [
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin'),
                ],
                [
                    'name' => 'user',
                    'email' => 'user@gmail.com',
                    'password' => bcrypt('user'),
                ],
                [
                    'name' => 'manager',
                    'email' => 'manager@gmail.com',
                    'password' => bcrypt('manager'),
                ],
            ];
            foreach ($data as  $value) {
            $user = User::create($value);
            $role=Role::get();
            // dd($user, $role);
            $user->roles()->attach($role);
            }
      
    }
}
