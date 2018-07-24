<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class eating extends Model
{
    protected $table = 'eating';
    public $timestamps = false;
    protected $date = ['deleted_at'];

    public function category()
    {
    	return $this->belongsTo('App\category', 'category_id', 'id');
    }

    public function order()
    {
    	return $this->belongsToMany('App\order');
    }
}
