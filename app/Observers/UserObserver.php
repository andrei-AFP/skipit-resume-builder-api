<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user)
    {
        $user->username = $this->generateUniqueUsername($user->name);
    }
    
    public function updating(User $user)
    {
        if ($user->isDirty('name')) {
            $user->username = $this->generateUniqueUsername($user->name);
        }
    }

    private function generateUniqueUsername(string $name): string
    {
        do {
            $base = Str::slug($name);
            $suffix = random_int(10000, 99999);
            $username = "{$base}-{$suffix}";
        } while (User::where('username', $username)->exists());

        return $username;
    }
}
