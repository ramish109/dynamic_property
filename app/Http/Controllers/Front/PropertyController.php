<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\SaveProperty;
use App\Models\Property;
use App\Models\SiteInfo;
use App\Models\PropertyDetail;
use App\Models\PropertyTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function index()
    {
        // dd("Hello Ro");
        App::setLocale(Session::get('currentLocal'));
        Session::get('currentLocal');
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);

        $city = City::with('cityTranslation')->get()->keyBy('id');
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');

        if(env('PROPERTIES_TEMPLATE')=='default')
        {
            return view('frontend.properties',compact('properties','city','minPrice','maxPrice','minArea','maxArea','categories'));
        }

        if(env('PROPERTIES_TEMPLATE')=='left-map')
        {
            return view('frontend.properties-left-map',compact('properties','city','minPrice','maxPrice','minArea','maxArea','categories'));
        }

    }

    public function singleProperty(Property $property)
    {

        $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->get();
        $locale   = Session::get('currentLocal');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        return view('frontend.property',compact('property','properties','propertyTranslation','propertyTranslationEnglish'));
    }

    public function searchProperties(Request $request)
    {
        // dd($request->all());
        $properties = Property::whereHas('propertyTranslation', function($query) use ($request){
                $query->where('title','LIKE','%'.$request->search.'%');
            })
            ->where('moderation_status',1)
            ->orderBy('id','desc')
            ->get();
    if(count($properties)>0)
    {
        foreach($properties as $property)
        {
            // $html = '
            // <div class="single-property-box">
            //     <div class="row">
            //         <div class="col-md-6 col-sm-12">
            //             <div class="property-item">
            //                 <a class="property-img" href="'.route('front.property',['property'=>$property->id]).'">
            //                     <img src="images/thumbnail/'.$property->thumbnail.'">
            //                 </a>
            //                 <ul class="feature_text">
            //                     '.($property->is_featured == 1 ? "<li class=\"feature_cb\"><span> Featured</span></li>" : "").'
            //                     '.($property->type == "sale" ? "<li class=\"feature_or\"><span>For Sale</span></li>" : "").'
            //                     '.($property->type == "rent" ? "<li class=\"feature_or\"><span>For Rent</span></li>" : "").'
            //                 </ul>
            //                 <div class="property-author-wrap">
            //                     <a href="#" class="property-author">
            //                        <img src="images/users/'.$property->user->image.'">
            //                         <span>'.$property->user->f_name.' '.$property->user->l_name.'</span>
            //                     </a>
            //                     <a href=".photo-gallery" class="btn-gallery" data-toggle="tooltip" data-placement="top" title="Photos"><i class="lnr lnr-camera"></i></a>


            //                 </div>
            //             </div>
            //         </div>
            //         <div class="col-md-6 col-sm-12">
            //             <div class="property-title-box">
            //                 <h4><a href="'.route('front.property',['property'=>$property->id]).'">'.$property->propertyTranslation->title
            //     .'</a></h4>
            //                 <div class="property-location">
            //                     <i class="la la-map-marker-alt"></i>
            //                     <p>'.$property->country->countryTranslation->name.','.$property->state->stateTranslation->name.','.$property->city->cityTranslation->name.'</p>
            //                 </div>
            //                 <ul class="property-feature">
            //                     <li> <i class="las la-bed"></i>
            //                         <span>'.$property->propertyDetails->bed.' Bedrooms</span>
            //                     </li>
            //                     <li> <i class="las la-bath"></i>
            //                         <span>'.$property->propertyDetails->bath.' Bath</span>
            //                     </li>
            //                     <li> <i class="las la-arrows-alt"></i>
            //                         <span>'.$property->propertyDetails->room_size.' sq ft</span>
            //                     </li>
            //                     <li> <i class="las la-car"></i>
            //                         <span>'.$property->propertyDetails->garage.' Garage</span>
            //                     </li>
            //                 </ul>
            //                 <div class="trending-bottom">
            //                     <div class="trend-left float-left">
            //                         <ul class="product-rating">
            //                             <li><i class="las la-star"></i></li>
            //                             <li><i class="las la-star"></i></li>
            //                             <li><i class="las la-star"></i></li>
            //                             <li><i class="las la-star-half-alt"></i></li>
            //                             <li><i class="las la-star-half-alt"></i></li>
            //                         </ul>
            //                     </div>
            //                     <a class="trend-right float-right">
            //                         <div class="trend-open">
            //                             <p><span class="per_sale">starts from</span>$'.$property->price.'</p>
            //                         </div>
            //                     </a>
            //                 </div>
            //             </div> 
            //         </div>
            //     </div>
            // </div>
            // ';
            $html = '
            <div class="row">
                <div class="col-md-6">
                    <div class="wp-block">
                        <div class="wp-block-title">
                            <h3>
                                <a href="#">
                                        <span class="card-heading">
                                            <!-- 5 Bedroom Detached Duplex with Bq  -->
                                        </span>
                                </a>
                            </h3>
                        </div>
                        <div class="wp-block-title">
                            <div class="wp-block-title-inner">
                                <div class="col-md-6 wp-block-title-images">
                                    <a href="#">
                                        <img class="sm-width-min-200-max-250-home xs-width-min-200-max-350"
                                            src="{{ asset('/images/thumbnail/'.$property->thumbnail)}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-6 wp-block-title-images">
                                    <div class="wp-block-title-text">
                                        <h4>{{$property->propertyTranslation->title}}</h4>
                                        <p class="description">
                                        {{$property->description}}
                                        </p>

                                        <span class="pull-left">
                                                <span content="NGN" class="price">₦</span><span content="350000000.00"
                                                                                                class="price">{{$property->price}}</span><span class="period"></span> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wp-block-title-footer">
                            <ul class="aux-info">
                                <li><i class="fa fa-bed"></i><span>{{$property->propertyDetails->bed}}</span> <span>Bedrooms</span></li>
                                <li><i class="fa fa-bath"></i><span>{{$property->propertyDetails->bath}}</span> <span>Bathrooms</span></li>
                                <li><i class="fa fa-arrows"></i><span>{{$property->propertyDetails->room_size}}</span> <span> Sq ft</span></li>
                                <li><i class="fa fa-car"></i><span>{{$property->propertyDetails->garage}}</span> <span>Parking Spaces</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            ';

            echo $html;
        }
    }else{
        $html = '<div class="row">
                <h3>No Results Found!</h3>
                 </div>
                ';
        echo $html;
    }

    }

    public function rent()
    {
        App::setLocale(Session::get('currentLocal'));
        Session::get('currentLocal'); 
        $site_info = SiteInfo::get();
        $faqs = $site_info[0]->faqs;
        $properties = Property::with(['propertyDetails','save_property','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->where('type','rent')
            ->orderBy('id','desc')
            ->paginate(4);
           
        return view('frontend.properties-rent',compact('properties','faqs'));
    }
    public function sale()
    {
        App::setLocale(Session::get('currentLocal'));
        Session::get('currentLocal');
        $site_info = SiteInfo::get();
        $faqs = $site_info[0]->faqs;
        $properties = Property::with(['propertyDetails','save_property','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->where('type','sale')
            ->orderBy('id','desc')
            ->paginate(4);
        // dd($properties);
        return view('frontend.properties-sale',compact('properties','faqs'));
    }

    public function getAllProperties()
    {
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->orderBy('id','desc')
            ->get();
        
        return $properties;
    }

    public function city(City $city)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
            ->where('moderation_status',1)
            ->where('status',1)
            ->orderBy('id','desc')
            ->paginate(4);
        $cit = City::with('cityTranslation')->get()->keyBy('id');
        $maxPrice = $props->max('price');
        $minPrice = $props->min('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
//        dd($city->properties);
        return view('frontend.properties-city',compact('city','maxPrice','minPrice','maxArea','minArea','maxArea','cit','categories'));
    }

    public function category($category)
    {
            $category = Category::where('name',$category)->first();
            App::setLocale(Session::get('currentLocal'));
            Session::get('currentLocal');
            $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
                ->where('moderation_status',1)
                ->where('category_id',$category->id)
                ->orderBy('id','desc')
                ->paginate(4);
            return view('frontend.properties-category',compact('properties'));
    }

    public function PostRequest(){

        return view('frontend.post-request');
    }

    public function PropertyDeveloper(){
        return view('frontend.property-developer');
    }

    // public function PropertyDemandTrend(){
    //     return view('frontend.property-demand-trends');
    // }

}
