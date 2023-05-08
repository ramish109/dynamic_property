<?php
namespace App\ViewModels;

use App\Services\PropertySearchService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\areas; 
use App\Models\City;

class PropertySearchModel implements IPropertySearchModel
{
    private $_propertySearchService;

    public function __construct(PropertySearchService $propertySearchService)
    {
        $this->_propertySearchService = $propertySearchService;
    } 

    public function getData(Request $request)
    {
        Session::get('currentLocal');


    $area_value = areas::where('name','=', $request->title )->get();
    $data = [];

        // if(! $area_value->isEmpty()){
        //     // $area = areas::where('name','=', $request->title )->get();
        //     // $data += array('category' => 'question');
            
        //     $city_id = $area_value[0]->city_id;
        //     $city = City::where('id','=', $city_id )->get();
        //     $data['area'] = $request->title;
        //     $data['title'] = "";
        // } else { 
        //     $data['title'] = $request->input('title');
        //     $data['area'] = "";
        // }
        
        $data = [];
        $data['title'] = $request->input('title');
        $data['category'] = $request->input('category_id');
        $data['city'] = $request->input('city_id');
        $data['minPrice'] = $request->input('minPrice');
        $data['maxPrice'] = $request->input('maxPrice');
        $data['minArea'] = $request->input('minArea');
        $data['maxArea'] = $request->input('maxArea');
        $data['bed'] = $request->input('bed');
        $data['bath'] = $request->input('bath');    
        $data['property_type'] = $request->input('property_type');
        
        // dd($data);
        return $this->_propertySearchService->getData($data);
    }

}
 