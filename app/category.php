<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function relate()
    {
    	return $this->hasMany('App\eating', 'id_category', 'id');
    }
}
