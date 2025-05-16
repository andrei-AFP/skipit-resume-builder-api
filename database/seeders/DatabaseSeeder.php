<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SkillTypeSeeder::class,
        ]);

        $this->call([
            SkillSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            ExperienceSeeder::class,
        ]);

        $this->call([
            EducationSeeder::class,
        ]);

        $this->call([
            LanguageSeeder::class,
        ]);
    }
}
