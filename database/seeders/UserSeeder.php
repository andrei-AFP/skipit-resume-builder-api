<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => env('APP_OWNER_NAME'),
            'email' => env('APP_OWNER_EMAIL'),
            'password' => Hash::make('password'),
            'avatar' => '/images/avatar.jpg',
            'birthday' => Carbon::create(env('APP_OWNER_BIRTHDAY')),
            'location' => env('APP_OWNER_LOCATION'),
            'phone_number' => env('APP_OWNER_PHONE'),
            'linkedin_url' => env('APP_OWNER_LINKEDIN'),
            'github_url' => env('APP_OWNER_GITHUB'),
        ]);
        
        $skills = Skill::all();
        $user->skills()->attach($skills);
    }
}
