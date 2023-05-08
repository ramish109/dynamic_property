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
     
        // dd("Store Fx");
        DB::table('save_properties')
            ->where('property_id', $property_id)
            ->update(['status' => 0]);

        return redirect()->back()->with('success', 'Property unsaved Successfully.');
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
     
        $items = SaveProperty::where('property_id',$property_id)->where('user_id',$user_id)->get();
        $property=Property::where('id',$property_id)->get()->toArray();

        if($items->isEmpty()){          
            $item = new SaveProperty();
            $item->user_id = $user_id;
            $item->property_id = $property_id;
            $item->category_id = $property[0]['category_id'];
            $item->country_id = $property[0]['country_id'];
            $item->state_id = $property[0]['state_id'];
            $item->city_id = $property[0]['city_id'];
            $item->status = 1;    
            $item->save();

        } else {

            DB::table('save_properties')
            ->where('property_id', $property_id)
            ->where('user_id', $user_id)
            ->update(['status' => 1]);
        }

        return redirect()->back()->with('success', 'Property saved Successfully.');
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
