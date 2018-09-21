<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contract;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContractPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the models contract.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $Contract
     * @return mixed
     */
    public function view(User $user, Contract $Contract)
    {
        //
    }

    /**
     * Determine whether the user can create models contracts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the models contract.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $Contract
     * @return mixed
     */
    public function update(User $user,Contract $Contract)
    {
        //
    }

    /**
     * Determine whether the user can delete the models contract.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $Contract
     * @return mixed
     */
    public function delete()
    {
        return auth()->user()->type === 'admin';
    }

    /**
     * Determine whether the user can restore the models contract.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $Contract
     * @return mixed
     */
    public function restore(User $user, Contract $Contract)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the models contract.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contract  $Contract
     * @return mixed
     */
    public function forceDelete(User $user, Contract $Contract)
    {
        //
    }
}
