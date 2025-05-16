<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['skills', 'skills.skillType', 'experiences', 'experiences.skills', 'experiences.skills.skillType', 'educations', 'languages'])->get();

        return $users;
    }

    /**
     * Display the specified user.
     */
    public function show($userId)
    {
        $user = User::with(['skills', 'skills.skillType', 'experiences', 'experiences.skills', 'experiences.skills.skillType', 'educations', 'languages'])->findOrFail($userId);
        $user['skills_by_type'] = $user->skillsByType();

        return $user;
    }

    /**
     * Display the specified user by key.
     */
    public function showByUsername($username)
    {
        $user = User::with(['skills', 'skills.skillType', 'experiences', 'experiences.skills', 'experiences.skills.skillType', 'educations', 'languages'])->where('username', $username)->firstOrFail();
        $user['skills_by_type'] = $user->skillsByType();

        return $user;
    }

    /**
     * Display the owner user.
     */
    public function showOwner()
    {
        $user = User::with(['skills', 'skills.skillType', 'experiences', 'experiences.skills', 'experiences.skills.skillType', 'educations', 'languages'])->firstOrFail();
        $user['skills_by_type'] = $user->skillsByType();

        return $user;
    }

    /**
     * Get skills for a specific user.
     */
    public function getSkills($userId)
    {
        $user = User::findOrFail($userId);

        return $user->skills;
    }
}
