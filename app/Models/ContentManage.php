<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentManage extends Model
{
    use HasFactory;
    protected $fillable = ['title','type','link','content','status'];
}
