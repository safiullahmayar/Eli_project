<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'create-task',
                'slug' => 'Create Task',
            ],
            [
                'name' => 'edit-task',
                'slug' => 'Edit Task',
            ],
            [
                'name' => 'delete-task',
                'slug' => 'Delete Task',
            ],
            [
                'name' => 'preview-task',
                'slug' => 'Delete Task',
            ],
        ];
        foreach ($data as  $value) {
        $permission = Permission::create($value);
        $role = Role::where('slug', 'admin')->first();
        // dd($permission, $role->permissions());
        $role->permissions()->attach($permission->id);
        }
    }
}
