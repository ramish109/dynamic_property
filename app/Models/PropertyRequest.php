<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','type','category_id','country_id','state_id','city_id','bed','budget','comments','name','user_type','email','phone','status'];

 
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
 



}

