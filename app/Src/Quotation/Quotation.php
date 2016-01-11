<?php

namespace App\Src\Quotation;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{

    public function user() {
        return $this->belongsTo('App\Src\User\User');
    }
}
