<?php

namespace App\Policies;

use App\Src\Quotation\Quotation;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function isAdmin(User $user, Quotation $quotation) {

        return $user->status === 'admin';

    }

    public function update(User $user, Quotation $quotation) {

        return $user->id === $quotation->user_id;

    }

    public function edit(User $user, Quotation $quotation) {

        return $user->id === $quotation->user_id;

    }
}
