<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;
    protected $table = 'pictures';
    protected $primaryKey = 'picture_id';
    protected $dates = ['deleted_at'];


}
