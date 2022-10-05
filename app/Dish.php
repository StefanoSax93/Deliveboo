<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        "name", "description", "price"
    ];

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function orders() {
        return $this->belongsToMany("App\Order");
    }
}
