<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
