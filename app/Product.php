<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $dates = ['deleted_at'];

    public function scopeWithSort($query, $sorting, $by)
    {
        return $query->orderBy($sorting, $by);
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'product_id');
    }

}
