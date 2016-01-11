<?php

namespace App\Policies;

use App\Src\Invoice\Invoice;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
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

    public function isAdmin(User $user, Invoice $invoice) {

        return $user->status === 'admin';

    }

    public function update(User $user, Invoice $invoice) {

        return $user->id === $invoice->user_id;

    }

    public function edit(User $user, Invoice $invoice) {

        return $user->id === $invoice->user_id;

    }
}
