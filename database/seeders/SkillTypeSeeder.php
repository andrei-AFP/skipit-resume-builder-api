<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SkillType;

class SkillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillTypes = [
            ['name' => 'Languages', 'color' => 'orange'],
            ['name' => 'Backend', 'color' => 'blue'],
            ['name' => 'Frontend', 'color' => 'green'],
            ['name' => 'DevOps', 'color' => 'purple'],
            ['name' => 'CMS/CRM', 'color' => 'lime'],
            ['name' => 'Databases', 'color' => 'sky'],
            ['name' => 'ERP', 'color' => 'emerald'],
            ['name' => 'Practices', 'color' => 'yellow'],
        ];

        foreach ($skillTypes as $type) {
            SkillType::create([
                'name' => $type['name'],
                'color' => $type['color'],
            ]);
        }
    }
}
