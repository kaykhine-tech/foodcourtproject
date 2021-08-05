<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','code_no','photo','price','discount','description','category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function orders($value=''){
        return $this->belongsToMany('App\Order')
                    ->withPivot('qty')
                    ->withTimestamps();
    }
}
