<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServiceSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            PortfolioSeeder::class,
            TestimonialSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            InvestmentSeeder::class,
            // TechLogoSeeder::class,
            // JobVacancy::class,
        ]);
    }
}
