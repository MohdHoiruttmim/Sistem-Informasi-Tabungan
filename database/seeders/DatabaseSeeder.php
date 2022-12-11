<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Heru Agirretxe',
            'email' => 'heru@paw.com',
            'password' => '$2y$10$92cB8snxERiEp8eSjX4LPulHQ7.87t2ruwmffwzZkoCYHj.N42cau',
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Guru',
            'email' => 'guru@paw.com',
            'password' => '$2y$10$92cB8snxERiEp8eSjX4LPulHQ7.87t2ruwmffwzZkoCYHj.N42cau',
            'role' => 'guru',
        ]);
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@paw.com',
            'password' => '$2y$10$92cB8snxERiEp8eSjX4LPulHQ7.87t2ruwmffwzZkoCYHj.N42cau',
            'role' => 'user',
        ]);
    }
}
