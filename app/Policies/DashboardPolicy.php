<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $abilities = $user->role->abilities->pluck('name')->toArray();
        return in_array('dashboard', $abilities);
    }
}
