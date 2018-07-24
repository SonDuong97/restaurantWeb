<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    protected $table = "order";
    protected $date = ['deleted_at'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function eating()
    {
    	return $this->belongsToMany('App\eating', 'eating_order', 'order_id', 'eating_id');
    }
}
