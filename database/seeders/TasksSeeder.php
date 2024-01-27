<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'title' => 'Tasks',
                'description' => 'Description',
                'status' => 'inprogress'
            ],
            [
                'title' => 'Tasks2',
                'description' => 'Description2',
                'status' => 'completed'
            ]
        ]);
    }
}
