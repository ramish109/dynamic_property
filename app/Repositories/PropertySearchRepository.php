<?php
namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;

class PropertySearchRepository implements IPropertySearchRepository
{
    public function getByCategory($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->paginate(10);
                        // ->get();
    }

    public function getByCity($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        // ->get();
                        ->paginate(10);
                        
    }

    public function getByPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        // ->get();
                        ->paginate(10);
    }

    public function getByArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryCity($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCityPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        // ->get();
                        ->paginate(10);
    }

    public function getByCityArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    // ->get();
                    ->paginate(10);
    }

    public function getByBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->where('bed',(int)$data['bed']);
                    })
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->where('bath',(int)$data['bath']);
                    })
                    // ->get();
                    ->paginate(10);
    }

    public function getByCategoryCityPrice($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->where('city_id',$data['city'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    // ->get();
                    ->paginate(10);
    }

    public function getByCategoryCityArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->where('city_id',$data['city'])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    // ->get();
                    ->paginate(10);
    }

    public function getByCategoryPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    // ->get();
                    ->paginate(10);
    }

    public function getByCityPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('city_id',$data['city'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    // ->get();
                    ->paginate(10);
    }

    public function getByCategoryCityPriceArea($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                    ->where('category_id',$data['category'])
                    ->where('city_id',$data['city'])
                    ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                    ->whereHas('propertyDetails',function(Builder $query) use($data){
                        $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                    })
                    // ->get();
                    ->paginate(10);
    }

    public function getByBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed', (int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath', (int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed', (int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryBath($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('category_id',$data['category'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bath', (int)$data['bath']);
        })
        // ->get();
        ->paginate(10);
    }
    public function getByCategoryBedBath($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('category_id',$data['category'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bed', (int)$data['bed']);
        })
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bath', (int)$data['bath']);
        })
        // ->get();
        ->paginate(10);
    }

    public function getByCityBed($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('city_id',$data['city'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bed', (int)$data['bed']);
        })
        // ->get();
        ->paginate(10);
    }
    public function getByCityBath($data){
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('city_id',$data['city'])
        ->whereHas('propertyDetails',function(Builder $query) use($data){
            $query->where('bath', (int)$data['bath']);
        })
        // ->get();
        ->paginate(10);
    }
    public function getByCityBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed', (int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath', (int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByPriceBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByPriceBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByPriceBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByAreaBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByAreaBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByAreaBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryCityBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryCityBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryCityBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryCityPriceBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryCityPriceBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryCityPriceBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryCityAreaBed($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryCityAreaBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }
    public function getByCategoryCityAreaBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCategoryCityPriceAreaBedBath($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->where('category_id',$data['category'])
                        ->where('city_id',$data['city'])
                        ->whereBetween('price', [(int)$data['minPrice'],(int)$data['maxPrice']])
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->whereBetween('room_size', [(int)$data['minArea'],(int)$data['maxArea']]);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bed',(int)$data['bed']);
                        })
                        ->whereHas('propertyDetails',function(Builder $query) use($data){
                            $query->where('bath',(int)$data['bath']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByCityName($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
                        ->whereHas('city',function(Builder $query) use($data){
                            $query->where('name',$data['title']);
                        })
                        // ->get();
                        ->paginate(10);
    }

    public function getByPropertyType($data)
    {
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('type',$data['property_type'])
        // ->get();
        ->paginate(10);
    }

    public function getByPropertyTypeCityArea($data)
    {
        // dd($data);
        return Property::with('propertyTranslation','propertyDetails','country.countryTranslation','state.stateTranslation','city.cityTranslation','category.categoryTranslation')
        ->where('type',$data['property_type'])
        ->paginate(10);
        // ->get();
    }
    
}
