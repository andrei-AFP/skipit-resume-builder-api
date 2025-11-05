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
        $user = User::first();
        $experiences = [
            [
                'user' => $user,
                'company' => 'BitSoft',
                'logo' => null,
                'position' => 'Senior Software Developer',
                'location' => 'Bucharest, Romania',
                'start_date' => Carbon::create(2025, 6),
                'end_date' => null,
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'Flutter', 'Vue.js', 'JavaScript', 'Laravel', 'PHP',
                    'Docker', 'Sass', 'Tailwind CSS', 'GitHub', 'MySQL',
                    'Agile',
                ])->get(),
            ],
            [
                'user' => $user,
                'company' => 'Cognizant Romania',
                'logo' => null,
                'position' => 'Senior Web Developer | Tech Lead',
                'location' => 'Bucharest, Romania',
                'start_date' => Carbon::create(2019, 8),
                'end_date' => Carbon::create(2025, 6),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'Laravel', 'PHP', 'React', 'MobX', 'TypeScript',
                    'Storybook', 'Jest', 'Next.js', 'PHP', 'Drupal',
                    'JavaScript', 'jQuery', 'Elixir', 'Phoenix Framework',
                    'Docker', 'Sass', 'Tailwind CSS', 'GitHub', 'MySQL',
                    'AWS Cloud', 'Microservices', 'Jenkins', 'Agile',
                    'Gulp', 'GraphQL',
                ])->get(),
            ],
            [
                'user' => $user,
                'company' => 'Wipro Limited',
                'logo' => null,
                'position' => 'Senior Web Developer | Team Lead',
                'location' => 'Bucharest, Romania',
                'start_date' => Carbon::create(2018, 8),
                'end_date' => Carbon::create(2019, 8),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'PHP', 'Symfony', 'HTML', 'Sass', 'Javascript',
                    'jQuery', 'restAPI', 'SAP', 'MySQL', 'ServiceNow',
                    'GitHub', 'Citrix', 'VDI', 'VPN', 'Redis',
                ])->get(),
            ],
            [
                'user' => $user,
                'company' => 'Roweb',
                'logo' => null,
                'position' => 'Senior PHP Developer | Team Lead',
                'location' => 'Pitesti, Romania',
                'start_date' => Carbon::create(2017, 10),
                'end_date' => Carbon::create(2018, 8),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'PHP', 'Laravel', 'CakePHP', 'Node.js', 'Elixir',
                    'HTML', 'Sass', 'Less', 'Gulp', 'JavaScript', 'jQuery',
                    'Socket.io', 'Wordpress', 'Prestashop', 'Magento',
                    'Python', 'GRPC', 'MySQL', 'Docker', 'AWS Cloud',
                    'GitHub', 'Agile',
                ])->get(),
            ],
            [
                'user' => $user,
                'company' => 'BoostIT Hub',
                'logo' => null,
                'position' => 'PHP Developer | Team Lead',
                'location' => 'Pitesti, Romania',
                'start_date' => Carbon::create(2015, 7),
                'end_date' => Carbon::create(2017, 10),
                'description' => null,
                'skills' => Skill::with('skillType')->whereIn('name', [
                    'PHP', 'Codeigniter', 'Slim', 'Yii2', 'Laravel', 'Symfony',
                    'HTML', 'Sass', 'JavaScript', 'jQuery', 'Socket.io',
                    'Jenkins', 'MySQL', 'Git', 'Bitbucket', 'Docker', 'RestAPI',
                    'GitHub', 'Agile', 'MongoDB', 'MariaDB',
                ])->get(),
            ],
            [
                'user' => $user,
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
