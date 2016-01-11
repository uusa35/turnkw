<?php
namespace App\Src\User;

use App\Core\UserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use UserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quotations()
    {
        return $this->hasMany('App\Src\Quotation\Quotation');
    }

    public function invoices()
    {
        return $this->hasMany('App\Src\Invoice\Invoice');
    }
}
