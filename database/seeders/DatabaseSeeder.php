<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::create([
            'username'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('123'),
        ]);

        User::factory()->count(1000)->create();

        $providers = ['XL', 'Telkomsel', 'Three', 'IM3'];
        foreach($providers as $provider)
            Provider::create([
                'name' => $provider,]);
    }
}