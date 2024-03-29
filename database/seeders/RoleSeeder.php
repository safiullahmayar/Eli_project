<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'User',
                'slug' => 'user',
            ],
            [
                'name' => 'manger',
                'slug' => 'manger',
            ]
        ];

        foreach ($data as $value) {
            $role = Role::firstOrCreate(['slug' => $value['slug']], $value);
            $user = User::find(1);

            if (!$user->roles->contains('slug', 'admin')) {
                $user->roles()->attach($role->id);
            }
        }
    }
}
