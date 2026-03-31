<?php

namespace App\Policies;

use App\Models\Progress;
use App\Models\User;

class ProgressPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Progress $progress): bool
    {
        return $progress->goal->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Progress $progress): bool
    {
        return $progress->goal->user_id === $user->id;
    }

    public function delete(User $user, Progress $progress): bool
    {
        return $progress->goal->user_id === $user->id;
    }
}
