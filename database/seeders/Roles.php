<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin', 'description' => 'All privilegies']);
        Role::create(['name' => 'moderator', 'description' => "Can moderate posts, but cant write"]);
        Role::create(['name' => 'writer', 'description' => 'Can write posts']);
        Role::create(['name' => 'commentator', 'description' => 'Can write comments']);
    }
}
