<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Demo Restaurant Account (User)
        $restaurantUser = User::firstOrCreate(
            ['email' => 'restaurant@healthmeals.com'],
            [
                'name' => 'Healthy Bites Owner',
                'password' => Hash::make('password'),
                'role' => 'restaurant',
            ]
        );

        // 2. Demo Restaurant Profile (Linked to User ID)
        Restaurant::firstOrCreate(
            ['user_id' => $restaurantUser->id],
            [
                'name' => 'Healthy Bites',
                'email' => 'restaurant@healthmeals.com',
            ]
        );

        // 3. Demo Customer Account
        User::firstOrCreate(
            ['email' => 'customer@healthmeals.com'],
            [
                'name' => 'John Customer',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ]
        );

        // 4. Demo Admin Account
        User::firstOrCreate(
            ['email' => 'admin@healthmeals.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        if ($this->command) {
            $this->command->info('--------------------------------------------');
            $this->command->info('  Demo Accounts Created Successfully:');
            $this->command->info('  Restaurant: restaurant@healthmeals.com / password');
            $this->command->info('  Customer:   customer@healthmeals.com / password');
            $this->command->info('  Admin:      admin@healthmeals.com / password');
            $this->command->info('--------------------------------------------');
        }
    }
}