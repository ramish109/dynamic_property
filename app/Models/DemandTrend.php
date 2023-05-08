<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandTrend extends Model
{
    use HasFactory;
    protected $fillable = ['locality_id','city_id','state_id','country_id','category_id','type'];

    // public function state(){
        
    //     return $this->belongsTo(State::class, 'state_id', 'id');
    // }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function properties(){
        return $this->belongsTo(Property::class, 'type', 'type');
    }

    public function cities(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
 
