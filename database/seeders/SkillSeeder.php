<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\SkillType;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skillsByType = [
            'Languages' => [
                [ 'name' => 'PHP' ],
                [ 'name' => 'JavaScript' ],
                [ 'name' => 'Elixir' ],
                [ 'name' => 'Python' ],
            ],
            'Backend' => [
                [ 'name' => 'Laravel' ],
                [ 'name' => 'Symfony' ],
                [ 'name' => 'Yii2', 'icon' => 'Yii' ],
                [ 'name' => 'Node.js', 'icon' => 'Nodedotjs' ],
                [ 'name' => 'Phoenix Framework', 'icon' => 'Phoenixframework' ],
            ],
            'Frontend' => [
                [ 'name' => 'React' ],
                [ 'name' => 'Next.js', 'icon' => 'Nextdotjs' ],
                [ 'name' => 'TypeScript' ],
            ],
            'Databases' => [
                [ 'name' => 'MySQL' ],
                [ 'name' => 'MongoDB' ],
                [ 'name' => 'Elasticsearch' ],
            ],
            'Practices' => [
                [ 'name' => 'Microservices', 'icon' => 'Hackthebox' ],
                [ 'name' => 'Agile', 'icon' => 'Jira' ],
                [ 'name' => 'Git' ],
            ],
        ];

        foreach ($skillsByType as $typeName => $skills) {
            $type = SkillType::where('name', $typeName)->first();
            
            if ($type) {
                foreach ($skills as $skill) {
                    Skill::create([
                        'name' => $skill['name'],
                        'icon' => isset($skill['icon']) ? $skill['icon'] : null,
                        'skill_type_id' => $type->id,
                    ]);
                }
            }
        }
    }
}
