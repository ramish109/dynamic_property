<?php

namespace App\Models;

use App\Models\Property; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveProperty extends Model
{ 
    use HasFactory;
    protected $fillable = ['user_id','property_id','country_id','state_id','city_id','category_id','status'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

    public function propertyDetails()
    {
        return $this->hasOne(PropertyDetail::class,'property_id','property_id');
    }

    public function propertyTranslationEnglish()
    {
        return $this->hasOne(PropertyTranslation::class,'property_id','property_id')
            ->where('locale','en');
    }


    public function country()
    {
        return $this->belongsTo(Country::class,'id');
    } 

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class,'property_id','property_id');
    }
}


