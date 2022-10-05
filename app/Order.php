<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo("App\User");
    }

    public function dishes() {
        return $this->belongsToMany("App\Dish");
    }

    protected $fillable = [
        "user_id","name", "surname", "address", "mail","phone","code","total_price"
    ];
}
