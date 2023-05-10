<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\SaveProperty;


if (! function_exists('getSaveProperty_toArray')){
    function getSaveProperty_toArray($property_id){
        return  SaveProperty::where([['property_id',$property_id],['status',1]])->pluck('user_id')->toArray();
        
    }
}

