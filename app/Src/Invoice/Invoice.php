<?php

namespace App\Src\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $dates = ['created_at', 'updated_at', 'project_date', 'due_date'];

    public function user()
    {
        return $this->belongsTo('App\Src\User\User');
    }
}
