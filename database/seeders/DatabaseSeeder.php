<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Joc;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Joc::factory(10)->times(100)->create();
    }
}
