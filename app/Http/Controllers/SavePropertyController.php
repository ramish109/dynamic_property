<?php

namespace App\Http\Controllers;

use App\Models\SaveProperty;
use App\Models\Property;
use App\Http\Requests\StoreSavePropertyRequest;
use App\Http\Requests\UpdateSavePropertyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use auth;

class SavePropertyController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->get();
        $auth = Auth::user();
        $properties = SaveProperty::with(['property','propertyDetails','propertyTranslationEnglish','image','country.countryTranslation'])
                    ->where('user_id', $auth->id)
                    ->where('status',1)
                    ->get();
        // dd($properties);
        return view('admin.save-property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSavePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($property_id,$user_id, Request $request)
    {
     
        
         $items = SaveProperty::where([['property_id',$property_id],['user_id',$user_id]])->first();
         $property=Property::where('id',$property_id)->first();
         
        
         if(!$items){    
                 
            $saveProperty = new SaveProperty();
            $saveProperty->user_id = $user_id;
            $saveProperty->property_id = $property_id;
            $saveProperty->category_id = $property->category_id;
            $saveProperty->country_id = $property->country_id;
            $saveProperty->state_id = $property->state_id;
            $saveProperty->city_id = $property->city_id;
            $saveProperty->status = 1;    
            $saveProperty->save();

        } else {
            $saveProperty= SaveProperty::Where([['property_id',$property_id],['user_id',$user_id]])->first();
            $saveProperty->status = 1;
            $saveProperty->save();
        }

        return redirect()->back()->with('success', 'Property Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaveProperty  $saveProperty
     * @return \Illuminate\Http\Response
     */
    public function show(SaveProperty $saveProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaveProperty  $saveProperty
     * @return \Illuminate\Http\Response
     */
    public function edit(SaveProperty $saveProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSavePropertyRequest  $request
     * @param  \App\Models\SaveProperty  $saveProperty
     * @return \Illuminate\Http\Response
     */
    public function update($property_id,$user_id, Request $request)
    {
     
        
        $items = SaveProperty::where('property_id',$property_id)->where('user_id',$user_id)->first();
        $property=Property::where('id',$property_id)->first();
        
        if(!$items->count()){    
                 
            $saveProperty = new SaveProperty();
            $saveProperty->user_id = $user_id;
            $saveProperty->property_id = $property_id;
            $saveProperty->category_id = $property->category_id;
            $saveProperty->country_id = $property->country_id;
            $saveProperty->state_id = $property->state_id;
            $saveProperty->city_id = $property->city_id;
            $saveProperty->status = 0;    
            $saveProperty->save();

        } else {
            $saveProperty= SaveProperty::Where([['property_id',$property_id],['user_id',$user_id]])->first();
            $saveProperty->status = 0;
            $saveProperty->save();
        }

        return redirect()->back()->with('success', 'Property Unsave Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaveProperty  $saveProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaveProperty $saveProperty)
    {
        //
    }
}
