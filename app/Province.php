<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'province_id';
    public $timestamps = false;

    public function scopeWithSort($query, $sorting, $by) {
        return $query->orderBy($sorting, $by);
    }

    public function supplier() {
        return $this->hasMany('App/Supplier');
    }
}
