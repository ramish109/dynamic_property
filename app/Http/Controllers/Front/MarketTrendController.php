<?php

namespace App\Http\Controllers\Front;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemandTrend;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\SiteInfo;
use App\Models\PropertyDetail;
use App\Models\City;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class MarketTrendController extends Controller
{
    //

    public function index()
    
    {   
        $statessale = Property::with('state')
            ->select('state_id', DB::raw( '(AVG(price)) as average'))
            ->where('state_id', '!=','null' )
            ->where('type','=','sale')
            ->groupBy('state_id')
            ->orderBy('average', 'desc')
            ->paginate(5);
            // ->get();                 
        
    
        $citiessale = Property::with('city')
            ->select('city_id', DB::raw( '(AVG(price)) as average'))
            ->where('city_id', '!=','null' )
            ->where('type','=','sale')
            ->groupBy('city_id')
            ->orderBy('average', 'desc')
            ->paginate(5);
            // ->get();   
            
        
        $statesrent = Property::with('state')
            ->select('state_id', DB::raw( '(AVG(price)) as average'))
            ->where('state_id', '!=','null' )
            ->where('type','=','rent')
            ->groupBy('state_id')
            ->orderBy('average', 'desc')
            ->paginate(5);
            // ->get();                 


        $citiesrent = Property::with('city')
            ->select('city_id', DB::raw( '(AVG(price)) as average'))
            ->where('city_id', '!=','null' )
            ->where('type','=','rent')
            
            ->groupBy('city_id')
            ->orderBy('average', 'desc')
            ->paginate(5);
            // ->get();       
    
        $site_info = SiteInfo::get();
        $about = $site_info[0]->about_us;
      
        // dd($statessale);
        return view('frontend.property-market-trends', compact('statessale', 'citiessale','statesrent', 'citiesrent','about') );
    
    }

    public function CityTrend($state){

        // dd($state);

        // $trends = DemandTrend::with('cities')
        //                     ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
        //                     ->where('city_id', '!=','null' )
        //                     ->where('state_id', '=', $state )
        //                     ->groupBy('city_id')
        //                     ->orderBy('Count', 'desc')
        //                     ->get();
                            
        // $topname = DB::table('states')->select('name')->where('id','=',$state)->get();
        // $heading = "Localties";
        // $rank = 1; $count = 0; $percent = 0;
        // foreach($trends as $trend){ $count+=$trend->Count; }
        // $percent = (100/$count);

        // return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));
    
        return view('frontend.market-demand-list');
    }

    //Average Sale Trends Prices
    public function MarketLocalityTrend($city){

        $datalist = Property::select(
                DB::raw('Count(price) as count'),
                DB::raw('MIN(created_at) as date'),
                DB::raw('AVG(price) as avgprice'), 
                DB::raw('MIN(price) as minprice'), 
                DB::raw('MAX(price) as maxprice'), 
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
            )
            ->where('city_id','=',$city)
            ->where('type','=','sale')
            ->groupBy('months')
            ->get();        

        $cityname= City::select('name')->where('id','=',$city)->get();
        $citytitle = $cityname[0]->name;
        $type = 'sale';
        return view('frontend.market-locality-avgprice', compact('datalist', 'city','citytitle','type') );
    }

    public function MarketLocalityTrendBed($city, $bed){
    
        $bedid = PropertyDetail::where('bed','=',$bed)->pluck('property_id')->toArray();
        $datalist = Property::
            select(
                DB::raw('Count(price) as count'),
                DB::raw('MIN(created_at) as date'),
                DB::raw('AVG(price) as avgprice'), 
                DB::raw('MIN(price) as minprice'), 
                DB::raw('MAX(price) as maxprice'), 
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            )->whereIn('id',$bedid)
            ->groupBy('months')
            ->where('type','=','sale')
            ->get();
            // dd($datalist);
        $cityname= City::select('name')->where('id','=',$city)->get();
        $citytitle = $cityname[0]->name;
        $type = 'sale';
        return view('frontend.market-locality-avgprice', compact('datalist', 'city', 'citytitle','type') );
    }

    //Average Rent Trends Prices
    public function MarketLocalityRentTrend($city){

        $datalist = Property::select(
                DB::raw('Count(price) as count'),
                DB::raw('MIN(created_at) as date'),
                DB::raw('AVG(price) as avgprice'), 
                DB::raw('MIN(price) as minprice'), 
                DB::raw('MAX(price) as maxprice'), 
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
            )
            ->where('city_id','=',$city)
            ->where('type','=','rent')
            ->groupBy('months')
            ->get();
        $cityname= City::select('name')->where('id','=',$city)->get();
        $citytitle = $cityname[0]->name;
        $type = 'rent';
        
        return view('frontend.market-locality-avgprice', compact('datalist', 'city','citytitle','type') );
    }


    public function MarketLocalityRentTrendBed($city, $bed){
    
        // dd($bed);
        $bedid = PropertyDetail::where('bed','=',$bed)->pluck('property_id')->toArray();
        $datalist = Property::
            select(
                DB::raw('Count(price) as count'),
                DB::raw('MIN(created_at) as date'),
                DB::raw('AVG(price) as avgprice'), 
                DB::raw('MIN(price) as minprice'), 
                DB::raw('MAX(price) as maxprice'), 
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            )->whereIn('id',$bedid)
            ->groupBy('months')
            ->where('type','=','rent')
            ->get();
            // dd($datalist);
        $cityname= City::select('name')->where('id','=',$city)->get();
        $citytitle = $cityname[0]->name;
        $type = 'rent';

        return view('frontend.market-locality-avgprice', compact('datalist', 'city', 'citytitle','type') );
    }
   
    public function show(Request $request)
    {
        $data = [];
        $data['title'] = $request->input('title');
        $data['type'] = $request->input('type');
        $data['bed'] = $request->input('bed');
        $cityname= City::where('name','=', $data['title'])->get();
        $citytitle = $data['title'];
        $type = $data['type'];
        $city = $cityname[0]->id;

        if($data['type']  && $data['bed']=="" && $data['title'] ){

            $datalist = Property::select(
                DB::raw('Count(price) as count'),
                DB::raw('MIN(created_at) as date'),
                DB::raw('AVG(price) as avgprice'), 
                DB::raw('MIN(price) as minprice'), 
                DB::raw('MAX(price) as maxprice'), 
                DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
            )
            ->where('city_id','=',$cityname[0]->id)
            ->where('type','=',$data['type'])
            ->groupBy('months')
            ->get();

            if(($datalist->isNotEmpty())){ return view('frontend.market-locality-avgprice', compact('datalist', 'city','citytitle','type') ); }
            else{ return redirect()->route('property.MarketTrends'); }

        } if($data['type']  && $data['bed'] && $data['title'] ){

            $bedid = PropertyDetail::where('bed','=',$data['bed'])->pluck('property_id')->toArray();
            $datalist = Property::
                select(
                    DB::raw('Count(price) as count'),
                    DB::raw('MIN(created_at) as date'),
                    DB::raw('AVG(price) as avgprice'), 
                    DB::raw('MIN(price) as minprice'), 
                    DB::raw('MAX(price) as maxprice'), 
                    DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
                )->whereIn('id',$bedid)
                ->groupBy('months')
                ->where('type','=',$data['type'])
                ->where('city_id','=',$city)
                ->get();


            $cityname= City::select('name')->where('id','=',$city)->get();
            $citytitle = $cityname[0]->name;
            $type = 'rent';

            if(($datalist->isNotEmpty())){ return view('frontend.market-locality-avgprice', compact('datalist', 'city','citytitle','type') ); }
            else{ return redirect()->route('property.MarketTrends'); }
         
        } else {
            return redirect()->route('property.MarketTrends');
        }
    }

    public function fetch(Request $request)
    {

        if($request->get('query')){
            $query = $request->get('query');
            
            if( isset($query) ){

                    $cities = City::where('name', 'LIKE', "%{$query}%")->where('status','=',1)->get();
                    // $states = State::where('name', 'LIKE', "%{$query}%")->where('status','=',1)->get();
                    $datalist = [];    

                    // foreach($states as $state){
                    //     $datalist[]=$state->name;
                    // }
                    foreach($cities as $city){
                        $datalist[]=$city->name;
                    }

                $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                foreach($datalist as $row)
                {
                    $output .= '
                    <li><a href="#" class="text-dark" style="font-size: small">'.$row.'</a></li>
                    ';
                }
                $output .= '</ul>';
                echo $output;
            } 
        }
    }

}


