<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'user' => User::find(1),
                'company' => 'Cognizant Romania',
                'logo' => null,
                'position' => 'Senior Web Developer',
                'location' => 'Bucharest, Romania',
                'start_date' => Carbon::create(2019, 8),
                'end_date' => null,
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'Laravel', 'PHP', 'React', 'MobX', 'TypeScript',
                    'Storybook', 'Jest', 'Next.js', 'PHP', 'Drupal',
                    'JavaScript', 'jQuery', 'Elixir', 'Phoenix Framework',
                ])->get(),
            ],
            [
                'user' => User::find(1),
                'company' => 'Wipro Limited',
                'logo' => null,
                'position' => 'Senior Web Developer',
                'location' => 'Bucharest, Romania',
                'start_date' => Carbon::create(2018, 8),
                'end_date' => Carbon::create(2019, 8),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'PHP', 'Symfony', 'HTML', 'SCSS', 'Javascript',
                    'jQuery', 'restAPI', 'SAP', 'MSSQL', 'ServiceNow',
                    'Jira', 'GitHub', 'Citrix', 'VDI', 'VPN',
                ])->get(),
            ],
            [
                'user' => User::find(1),
                'company' => 'Roweb',
                'logo' => null,
                'position' => 'Senior PHP Developer',
                'location' => 'Pitesti, Romania',
                'start_date' => Carbon::create(2017, 10),
                'end_date' => Carbon::create(2018, 8),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'PHP', 'Laravel', 'CakePHP', 'Node.js', 'Elixir',
                    'HTML', 'SCSS', 'Less', 'Gulp', 'JavaScript', 'jQuery',
                    'Wordpress', 'Prestashop', 'Magento',
                    'Python', 'GRPC', 'MySQL', 'Docker', 'AWS Cloud',
                ])->get(),
            ],
            [
                'user' => User::find(1),
                'company' => 'BoostIT Hub',
                'logo' => null,
                'position' => 'PHP Developer',
                'location' => 'Pitesti, Romania',
                'start_date' => Carbon::create(2015, 7),
                'end_date' => Carbon::create(2017, 10),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'PHP', 'Codeigniter', 'Slim', 'Yii2', 'Laravel', 'Symfony',
                    'HTML', 'SCSS', 'JavaScript', 'jQuery',
                    'Jenkins', 'MySQL', 'Git', 'Bitbucket', 'Jira', 'Docker', 'RestAPI'
                ])->get(),
            ],
            [
                'user' => User::find(1),
                'company' => 'AIESEC',
                'logo' => null,
                'position' => 'Team Leader Graphics & Web',
                'location' => 'Pitesti, Romania',
                'start_date' => Carbon::create(2014, 10),
                'end_date' => Carbon::create(2015, 8),
                'description' => "
                    Organized youth development projects<br>
                    Designs: avatars, posters, diplomas, logos, etc.<br>
                    Communication & Marketing, internships
                ",
                'skills' => [],
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create([
                'user_id' => $experience['user']->id,
                'company' => $experience['company'],
                'logo' => $experience['logo'],
                'position' => $experience['position'],
                'location' => $experience['location'],
                'start_date' => $experience['start_date'],
                'end_date' => $experience['end_date'],
                'description' => $experience['description'],
            ])->skills()->attach($experience['skills']);
        }
    }
}
