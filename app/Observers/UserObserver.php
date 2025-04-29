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

    protected function generateUniqueUsername(string $name): string
    {
        do {
            $base = Str::slug($name);
            $suffix = Str::lower(Str::random(6));
            $username = "{$base}-{$suffix}";
        } while (User::where('username', $username)->exists());

        return $username;
    }
}
