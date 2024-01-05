<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::factory()->create([
            'name' => 'ADMIN'
        ]);
        Role::factory()->create([
            'name' => 'EDITOR'
        ]);
        Role::factory()->create([
            'name' => 'VIEWER'
        ]);
        User::factory(30)->create();
        User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin.gmail.com',
            'role_id' => '1',
        ]);
        User::factory()->create([
            'first_name' => 'editor',
            'last_name' => 'editor',
            'email' => 'editor.gmail.com',
            'role_id' => '2',
        ]);
        User::factory()->create([
            'first_name' => 'viewer',
            'last_name' => 'viewer',
            'email' => 'viewer.gmail.com',
            'role_id' => '3',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
