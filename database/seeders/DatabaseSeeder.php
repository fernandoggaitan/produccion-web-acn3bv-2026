<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        /*
        User::factory(50)->create();

        Course::factory(500)->create();

        Comment::factory(5000)->create();
        */

        $roles = ['Admin', 'Docente', 'Estudiante'];

        foreach($roles as $name){
            Role::create([
                'name' => $name
            ]);
        }

    }
}
