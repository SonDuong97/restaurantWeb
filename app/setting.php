<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class setting extends Model
{
    protected $table = 'setting';
    public $timestamps = false;
    protected $date = ['deleted_at'];
}
