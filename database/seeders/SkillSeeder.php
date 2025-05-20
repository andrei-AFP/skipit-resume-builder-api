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
                [ 'name' => 'Codeigniter' ],
                [ 'name' => 'CakePHP' ],
                [ 'name' => 'GraphQL' ],
            ],
            'Frontend' => [
                [ 'name' => 'React' ],
                [ 'name' => 'MobX' ],
                [ 'name' => 'Next.js', 'icon' => 'Nextdotjs' ],
                [ 'name' => 'TypeScript' ],
                [ 'name' => 'Jest' ],
                [ 'name' => 'Socket.io', 'icon' => 'Socketdotio' ],
                [ 'name' => 'Sass', 'icon' => 'Sass' ],
                [ 'name' => 'Less' ],
                [ 'name' => 'Tailwind CSS', 'icon' => 'Tailwindcss' ],
                [ 'name' => 'jQuery' ],
                [ 'name' => 'Storybook' ],
                [ 'name' => 'Gulp' ],
            ],
            'DevOps ' => [
                [ 'name' => 'GitHub' ],
                [ 'name' => 'Docker' ],
                [ 'name' => 'AWS Cloud', 'icon' => 'Amazon' ],
                [ 'name' => 'Kubernetes', 'icon' => 'Kubernetes' ],
                [ 'name' => 'Jenkins' ],
            ],
            'CMS/CRM' => [
                [ 'name' => 'Drupal' ],
                [ 'name' => 'Wordpress' ],
                [ 'name' => 'Magento', 'icon' => 'Mega' ],
                [ 'name' => 'Prestashop' ],
            ],
            'Databases' => [
                [ 'name' => 'MySQL' ],
                [ 'name' => 'Redis' ],
                [ 'name' => 'MongoDB' ],
                [ 'name' => 'MariaDB' ],
                [ 'name' => 'Elasticsearch' ],
            ],
            'ERP' => [
                [ 'name' => 'SAP' ],
            ],
            'Practices' => [
                [ 'name' => 'Microservices', 'icon' => 'Hackthebox' ],
                [ 'name' => 'Agile', 'icon' => 'Jira' ],
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
