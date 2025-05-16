<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $languageList = [
            [
                'user' => $user,
                'name' => 'Romanian',
                'proficiency' => 'Native',
            ],
            [
                'user' => $user,
                'name' => 'English',
                'proficiency' => 'C1 (Listening, Reading, Speaking, Writing)',
            ],
            [
                'user' => $user,
                'name' => 'French',
                'proficiency' => 'A1 (Basic understanding)',
            ],
        ];

        foreach ($languageList as $language) {
            Language::create([
                'user_id' => $language['user']->id,
                'name' => $language['name'],
                'proficiency' => $language['proficiency'],
            ]);
        }
    }
}
