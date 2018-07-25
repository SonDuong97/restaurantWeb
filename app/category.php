<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    protected $table = 'category';
    protected $date = ['deleted_at'];
    public $timestamps = false;

    public function eating()
    {
    	return $this->hasMany('App\eating', 'category_id', 'id');
    }
}
