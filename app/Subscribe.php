<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscribe extends Model
{
    use SoftDeletes;
    protected $table = 'subscribes';
    protected $primaryKey = 'subscribe_id';
    protected $dates = ['deleted_at'];

    public function scopeWithSort($query, $sorting, $by)
    {
        return $query->orderBy($sorting, $by);
    }
}
