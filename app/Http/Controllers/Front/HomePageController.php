<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog; 
use App\Models\BlogCategory;
use App\Models\Category; 
use App\Models\City;
use App\Models\Country; 
use App\Models\areas; 
use App\Models\Facility;
use App\Models\HeaderImage;
use App\Models\Image;
use App\Models\OurPartner;
use App\Models\Package;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyTranslation;
use App\Models\SiteInfo;
use App\Models\State;
use App\Models\Testimonial;
use App\Models\User;
use App\ViewModels\IPropertySearchModel;
use App\Repositories\IPropertySearchRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\DemandTrend;

class HomePageController extends Controller
{
    private $_propertySearchModel;
    private $_propertySearchRepository;

    public function __construct(IPropertySearchModel $propertySearchModel,IPropertySearchRepository $properties)
    {
        Session::put('currentLocal', 'en');
        App::setLocale('en');

        $this->_propertySearchModel = $propertySearchModel;
        $this->_propertySearchRepository = $properties;
    }

    public function index() 
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');

        $properties = Property::with(['save_property'])->where('moderation_status',1)
                        ->where('status',1)
                        ->get();

        // dd($properties);
        // $properties = DB::table('properties')
            //             ->join('cities', 'properties.city_id', '=', 'cities.id')
            //             ->join('countries', 'properties.country_id', '=', 'countries.id')
            //             ->join('currencies', 'properties.currency_id', '=', 'currencies.id')
            //             ->join('states', 'properties.state_id', '=', 'states.id')
            //             ->join('users', 'properties.user_id', '=', 'users.id')
            //             ->join('property_details', 'property_details.property_id', '=', 'properties.id')
            //             ->join('packages', 'properties.package_id', '=', 'packages.id')
            //             ->join('package_user', 'package_user.package_id', '=', 'packages.id')
            //             ->select('properties.*', 'cities.name as city_name', 'countries.name as country_name',
            //                 'states.name as state_name,users.f_name as user_name','property_details.bed as bed',
            //                 'property_details.bath as bath','property_details.garage as garage',
            //                 'property_details.room_size as room_size','package_user.expire_at as expire_at','currencies.icon as icon')
            //             ->where([
            //                 ['properties.moderation_status', 1],
            //                 ['properties.status', 1]
            //             ])
        //             ->get();
                    // dd($properties);
        $maxPrice = $properties->max('price');
        $minPrice = $properties->min('price');
        foreach ($properties as $row)
        {
            $currentTime = Carbon::now();
            $end_time = new Carbon($row->expire_at);
            if($currentTime > $end_time)
            {
                $row->status = 0;
                $row->save();
            }
        }

        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $country = Country::with('countryTranslation')->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $agents = User::get()->keyBy('id');
        $users = User::where('type','user')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->get()->keyBy('id');
        $propertyTranslation = PropertyTranslation::where('locale',$locale)->get()->keyBy('property_id');
        $propertyTranslationEnglish = PropertyTranslation::where('locale','en')->get()->keyBy('property_id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        $image = Image::get()->keyBy('property_id');
        $facilities = Facility::get();
        $siteInfo = SiteInfo::first();
        $newses = Blog::with('blogTranslation','user')->where('status','approved')->orderBy('id','desc')->paginate(4);
        $popularTopics = BlogCategory::with('blogCategoryTranslation','blogs')->where('status',1)->get()->keyBy('id');
        $headerImage = HeaderImage::where('page','home')->first();
        
        $agent_developer = User::select(DB::raw('Count(id) as count'))->where('type','=','user')->get();
        $propery_listing = Property::select(DB::raw('Count(id) as property_count'))->get();        
        $area_covered_all = City::select(DB::raw('Count(id) as area_count'))->get();        
        $area_covered = $area_covered_all[0]->area_count;
        $agent_developer = $agent_developer[0]->count;
        $property_count = $propery_listing[0]->property_count;
        
        return view('frontend.index',compact('properties','maxPrice','minPrice','propertyDetails','maxArea','minArea',
        'country','city','agents','users','states','categories','propertyTranslation','propertyTranslationEnglish',
        'image','locale','facilities','siteInfo','newses','popularTopics','headerImage', 'agent_developer','property_count','area_covered'));
    }

    public function about()
    {
        $testimonials = Testimonial::with(['testimonialTranslation','testimonialTranslationEnglish'])
            ->orderBy('id','DESC')
            ->get();
        $partners = OurPartner::all();
        $agents = User::where('type','user')->get();
        $headerImage = HeaderImage::where('page','about-us')->first();

        return view('frontend.about',compact('testimonials','partners','agents','headerImage'));
    }

    public function errorPage()
    {
        return view('frontend.404-page');
    }


    public function membershipPackage()
    {
        $packages = Package::with('packageTranslation')->orderBy('id','DESC')->get();
        return view('frontend.membership-package',compact('packages'));
    }


    public function addListing()
    {
        return view('frontend.add-listing');
    }

    public function getCity(Request $request)
    {
        $cities = City::where('state_id',$request->state)->get();
        echo '<option value="0">Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->name.'</option>';
        }
    }

    public function searchProperty(Request $request)
    {
        $props = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','image'])
        ->where('moderation_status',1)
        ->where('status',1)
        ->orderBy('id','desc')
        ->paginate(4);
        


        $city = City::with('cityTranslation')->get()->keyBy('id');
        $minPrice = $props->min('price');
        $maxPrice = $props->max('price');
        $propertyDetails = PropertyDetail::get()->keyBy('property_id');
        $maxArea = $propertyDetails->max('room_size');
        $minArea = $propertyDetails->min('room_size');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');
        
        $site_info = SiteInfo::first();
        // dd($site_info->faqs);
        $faqs = (empty($site_info)) ? '' :  $site_info->faqs ;


        $data = $request->all();
        // dd($data);
        // $area_value = areas::where('name','=', $request->title )->get();

        // // !$data->isEmpty()
        // if(! $area_value->isEmpty()){

        //     $area = areas::where('name','=', $request->title )->get();
        //     // $city = areas::where('name','=', $request->title )->get();
        //     $city_id = $area[0]->city_id;
        //     $data += array('category' => 'question');
        //    dd($request->all()); 
        // }

        //Poperty Search
        $properties = $this->_propertySearchModel->getData($request);
        $data = $request->all();
        // dd($properties);
        // insert search histroy code start
        $getCity = City::where('name',$request->title)->first();
        
        if( $properties != null && (count($properties) > 0) ){
            $dt = new DemandTrend();
            $dt->city_id = ($getCity) ? $getCity->id : null;
            $dt->state_id = ($getCity) ? $getCity->state_id : null;
            $dt->country_id = ($getCity) ? $getCity->country_id : null;
            $dt->type = ($request->property_type) ? $request->property_type : null;
            $dt->category_id = ($request->category_id) ? $request->category_id : null;
            $dt->status = 1;
            $dt->save();
        }

        // insert search histort code end


        if( ! empty($properties[0])) {
            // dd("sdfsdf");
            if (isset($request->property_type) && $request->property_type != '') {
                if ($request->property_type == 'sale') {
                    return view('frontend.properties-sale', compact('properties', 'data', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories','faqs'));
                } elseif ($request->property_type == 'rent') {
                    return view('frontend.properties-rent', compact('properties', 'data', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories','faqs'));
                }
            } elseif ( ($request->property_type != 'sale') && ($request->property_type != 'rent') ) {
                // dd($properties);
                return view('frontend.properties-sale', compact('properties', 'data', 'city', 'minPrice', 'maxPrice', 'minArea', 'maxArea', 'categories','faqs'));
            }
        } else {
            return view('frontend.404-page', compact('faqs'));
        }
    }

    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            // $areas = area::where('name', 'LIKE', "%{$query}%")->get();

            $data = City::where('name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
                {
                    $output .= '
                    <li><a href="#" class="text-dark px-2" style="font-size: small">'.$row->name.','.$row->state->name.'</a></li>
                    ';
                } 
            $output .= '</ul>';
            echo $output;
        }

        // if($request->get('query')){
        //     $query = $request->get('query');
        //     if( isset($query) ){
        //             $cities = City::where('name', 'LIKE', "%{$query}%")->where('status','=',1)->get();
        //             // $states = State::where('name', 'LIKE', "%{$query}%")->where('status','=',1)->get();
        //             $areas = areas::where('name', 'LIKE', "%{$query}%")->where('status','=',1)->get();        


        //             $datalist = [];    

        //             // foreach($states as $state){
        //             //     $datalist[]=$state->name;
        //             // }
        //             foreach($cities as $city){
        //                 $datalist[]=$city->name .', '.$city->state->name;
        //             }
        //             foreach($areas as $area){
        //                 $datalist[]=$area->name .', Area';
        //             }

        //         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        //         foreach($datalist as $row)
        //         {
        //             $output .= '
        //             <li><a href="#" class="text-dark px-2" style="font-size: small">'.$row.'</a></li>
        //             ';
        //         }
        //         $output .= '</ul>';
        //         echo $output;
        //     } 
        // }

    }

    public function getByCategory($categoryId)
    {
        $data = [];
        $data['category'] = $categoryId;
        return $this->_propertySearchRepository->getByCategory($data);
    }

    public function getByCity($cityId)
    {
        $data = [];
        $data['city'] = $cityId;
        return $this->_propertySearchRepository->getByCity($data);
    }

    public function getByPrice($minPrice,$maxPrice)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByPrice($data);
    }

    public function getByArea($minArea,$maxArea)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByArea($data);
    }

    public function getByCategoryCity($categoryId,$cityId)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        return $this->_propertySearchRepository->getByCategoryCity($data);
    }

    public function getByCategoryPrice($categoryId,$minPrice,$maxPrice)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByCategoryPrice($data);
    }
    public function getByCategoryArea($categoryId,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryArea($data);
    }
    public function getByCityPrice($cityId,$minPrice,$maxPrice)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByCityPrice($data);
    }
    public function getByCityArea($cityId,$minArea,$maxArea)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCityArea($data);
    }
    public function getByPriceArea($minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByPriceArea($data);
    }
    public function getByBedBath($bed,$bath)
    {
        $data = [];
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByBedBath($data);
    }
    public function getByCategoryCityPrice($categoryId,$cityId,$minPrice,$maxPrice)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        return $this->_propertySearchRepository->getByCategoryCityPrice($data);
    }
    public function getByCategoryCityArea($categoryId,$cityId,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryCityArea($data);
    }
    public function getByCategoryPriceArea($categoryId,$minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryPriceArea($data);
    }
    public function getByCityPriceArea($cityId,$minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCityPriceArea($data);
    }
    public function getByCategoryCityPriceArea($categoryId,$cityId,$minPrice,$maxPrice,$minArea,$maxArea)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        return $this->_propertySearchRepository->getByCategoryCityPriceArea($data);
    }

    public function getByBed($bed)
    {
        $data = [];
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByBed($data);
    }

    public function getByBath($bath)
    {
        $data = [];
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByBath($data);
    }

    public function getByCategoryBed($categoryId,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryBed($data);
    }

    public function getByCategoryBath($categoryId,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryBath($data);
    }

    public function getByCategoryBedBath($categoryId,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryBedBath($data);
    }

    public function getByCityBed($cityId,$bed)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCityBed($data);
    }

    public function getByCityBath($cityId,$bath)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCityBath($data);
    }

    public function getByCityBedBath($cityId,$bed,$bath)
    {
        $data = [];
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCityBedBath($data);
    }


    public function getByPriceBed($minPrice,$maxPrice,$bed)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByPriceBed($data);
    }

    public function getByPriceBath($minPrice,$maxPrice,$bath)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByPriceBath($data);
    }

    public function getByPriceBedBath($minPrice,$maxPrice,$bed,$bath)
    {
        $data = [];
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByPriceBedBath($data);
    }

    public function getByAreaBed($minArea,$maxArea,$bed)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByAreaBed($data);
    }

    public function getByAreaBath($minArea,$maxArea,$bath)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByAreaBath($data);
    }

    public function getByAreaBedBath($minArea,$maxArea,$bed,$bath)
    {
        $data = [];
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByAreaBedBath($data);
    }


    public function getByCategoryCityBed($categoryId,$cityId,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryCityBed($data);
    }

    public function getByCategoryCityBath($categoryId,$cityId,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityBath($data);
    }

    public function getByCategoryCityBedBath($categoryId,$cityId,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityBedBath($data);
    }
    public function getByCategoryCityPriceBed($categoryId,$cityId,$minPrice,$maxPrice,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryCityPriceBed($data);
    }
    public function getByCategoryCityPriceBath($categoryId,$cityId,$minPrice,$maxPrice,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityPriceBath($data);
    }
    public function getByCategoryCityPriceBedBath($categoryId,$cityId,$minPrice,$maxPrice,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityPriceBedBath($data);
    }


    public function getByCategoryCityAreaBed($categoryId,$cityId,$minArea,$maxArea,$bed)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        return $this->_propertySearchRepository->getByCategoryCityAreaBed($data);
    }
    public function getByCategoryCityAreaBath($categoryId,$cityId,$minArea,$maxArea,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityAreaBath($data);
    }
    public function getByCategoryCityAreaBedBath($categoryId,$cityId,$minArea,$maxArea,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityAreaBedBath($data);
    }
    public function getByCategoryCityPriceAreaBedBath($categoryId,$cityId,$minPrice,$maxPrice,$minArea,$maxArea,$bed,$bath)
    {
        $data = [];
        $data['category'] = $categoryId;
        $data['city'] = $cityId;
        $data['minPrice'] = $minPrice;
        $data['maxPrice'] = $maxPrice;
        $data['minArea'] = $minArea;
        $data['maxArea'] = $maxArea;
        $data['bed'] = $bed;
        $data['bath'] = $bath;
        return $this->_propertySearchRepository->getByCategoryCityPriceAreaBedBath($data);
    }
    public function getByCityName($cityName)
    {
        $data = [];
        $data['title'] = $cityName;
        return $this->_propertySearchRepository->getByCityName($data);
    }
    public function photo()
    {
        if (file_exists( public_path().'/storage/thumbnail/'.$this->thumbnail)) {
            return 'images/property/property_1.jpg';
        } else {
            return 'images/property/property_1.jpg';
        }
    }

    public function faqs(){
        $faqs = SiteInfo::select('faqs')->get()->first();

        return view('frontend.faqs', compact('faqs'));
    }
    public function terms(){
        $terms = SiteInfo::select('terms_condition')->get()->first();
        return view('frontend.terms', compact('terms'));
    }

    public function PrivacyPolicy(){
        $privacy = SiteInfo::select('privacy_policy')->get()->first();
        return view('frontend.privacy-policy',compact('privacy'));
    }

}
