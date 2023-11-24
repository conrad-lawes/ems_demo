<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Eloquent::unguard();
            \App\Models\User::factory()->create([
                'name' => 'Sys Admin',
                'email' => 'admin@example.biz',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            if (\App::environment() === 'production')
            {
                $this->call(
                    [
                        DepartmentSeeder::class,
                        // EmployeeSeeder::class,
                        StaffTypeSeeder::class,
                    ]);
            }
            else
            {

                \App\Models\User::factory(10)->create();
                $this->call(
                    [
                        DepartmentSeeder::class,
                        EmployeeSeeder::class,
                        StaffTypeSeeder::class,
                        StarterSeeder::class,
                    ]);
            }
        }

        
}
