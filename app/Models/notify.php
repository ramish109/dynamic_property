<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notify extends Model
{
    use HasFactory;

    protected $fillable = ['type','sender_id','reciever_id','pkg_user','property_user_id','property_id','status','read_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function properties()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

    public function property_user()
    {
        return $this->belongsTo(User::class,'property_user_id');
    }
    
}
