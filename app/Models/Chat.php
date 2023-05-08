<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = ['sender_id','reciever_id','message','status'];


    public function user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
}