<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $educationList = [
            [
                'user' => $user,
                'institution' => 'Facultatea de Electronica, Comunicatii si Calculatoare',
                'specialization' => 'Computer programming',
                'degree' => 'Engineering University',
                'logo' => null,
                'location' => 'Pitesti, Romania',
                'description' => '',
                'start_date' => Carbon::create(2014),
                'end_date' => Carbon::create(2018),
            ],
            [
                'user' => $user,
                'institution' => 'Liceul Teoretic "Ion Barbu"',
                'specialization' => 'Math - Informatics',
                'degree' => 'High School',
                'logo' => null,
                'location' => 'Pitesti, Romania',
                'description' => '',
                'start_date' => Carbon::create(2010),
                'end_date' => Carbon::create(2014),
            ],
        ];

        foreach ($educationList as $education) {
            Education::create([
                'user_id' => $education['user']->id,
                'institution' => $education['institution'],
                'specialization' => $education['specialization'],
                'degree' => $education['degree'],
                'logo' => $education['logo'],
                'location' => $education['location'],
                'description' => $education['description'],
                'start_date' => $education['start_date'],
                'end_date' => $education['end_date'],
            ]);
        }
    }
}
