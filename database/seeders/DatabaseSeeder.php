<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::updateOrCreate([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'status' => 'writer',
        ]);

        User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => 'admin',
        ]);

        // CategorySeeder::factory(10)->create();
        $this->call(CategorySeeder::class);

        $this->call(ArticleSeeder::class);


    }
}
