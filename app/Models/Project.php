<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'user_id',
        'package_id',
        'title',
        'facility_id',
        'category_id',
        'country_id',
        'state_id',
        'city_id',
        'lat',
        'lon',
        'bed',
        'bath',
        'floor',
        'room_size',
        'installment',
        'price',
        'currency_id',
        'status',
        'is_featured',
        'description',
        'thumbnail',
        'image_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    } 

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function package()
    {
        return $this->belongsTo(PackageUser::class,'package_id');
    }

    public function facilities()
    {
        return $this->belongsTo(Facility::class,'id');
    }


}
