<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $date = ['deleted_at'];

    public function order()
    {
        return $this->hasMany('App\order', 'user_id', 'id');
    }
}



// class User extends Model
// {
//     protected $table = 'users';
//     public $timestamps = false;

//     public function order()
//     {
//         return $this->hasMany('App\order', 'user_id', 'id');
//     }
// }
