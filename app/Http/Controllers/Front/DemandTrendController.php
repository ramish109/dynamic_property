<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\DemandTrend;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\City;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;


class DemandTrendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = DemandTrend::with('states')
                            ->select( 'state_id', DB::raw( '(COUNT(state_id)) as StateCount'))
                            ->where('state_id', '!=','null' )
                            ->groupBy('state_id')
                            ->orderBy('StateCount', 'desc')
                            ->get();                            
        
        
        $staterank = 1; $sumcount = 0; $percent = 0;
        foreach($states as $state){
            $sumcount+=$state->StateCount; 
        }

        if($sumcount > 0){
            $percent = (100/$sumcount);
        }


        //Category for Trends Search Results
        $categories = DemandTrend::with('categories')
                            ->select( 'category_id', DB::raw( '(COUNT(category_id)) as CategoryCount'))
                            ->where('category_id', '!=','null' )
                            ->groupBy('category_id')
                            ->orderBy('CategoryCount', 'desc')
                            ->get();

        $categoryrank = 1; $sum_category_count = 0; $category_percent = 0;
        foreach($categories as $category){
            $sum_category_count+=$category->CategoryCount; 
        }
             
        if($sum_category_count > 0){
            $category_percent = (100/$sum_category_count);
        }


        //Cities for Trends Search Results
        $cities = DemandTrend::with('cities')
                            ->select( 'city_id', DB::raw( '(COUNT(city_id)) as CityCount'))
                            ->where('city_id', '!=','null' )
                            ->groupBy('city_id')
                            ->orderBy('CityCount', 'desc')
                            ->get();

        $cityrank = 1; $sum_city_count = 0; $city_percent = 0;
        foreach($cities as $city){
            $sum_city_count+=$city->CityCount; 
        }

        if($sum_city_count > 0){
            $city_percent = (100/$sum_city_count);
        }
        

        $types = DemandTrend::with('properties')
                            ->select( 'type', DB::raw( '(COUNT(type)) as TypeCount'))
                            ->where('type', '!=','null' )
                            ->groupBy('type')
                            ->orderBy('TypeCount', 'desc')
                            ->get();
        
        $typerank=1; $sum_type_count = 0; $type_percent = 0;
        foreach($types as $type){
            $sum_type_count+=$type->TypeCount; 
        }

        if($sum_type_count > 0){
            $type_percent = (100/$sum_type_count);
        }

        $country = DB::table('demand_trends')->select( 'country_id', DB::raw( '(COUNT(country_id)) as CountryCount'))->groupBy('country_id')->get();    

        
        return  view('frontend.property-demand-trends', 
                compact('states','categories','staterank','typerank','categoryrank','cityrank','sumcount', 'percent','category_percent', 'city_percent', 'type_percent', 'types', 'cities'));
     
    }

    public function fetch(Request $request)
    {

        if($request->get('query')){
            $query = $request->get('query');
            
            if( isset($query) ){

                    // $cities = City::where('name', 'LIKE', "%{$query}%")->get();
                    $states = State::where('name', 'LIKE', "%{$query}%")->get();
                    $datalist = [];    

                    foreach($states as $state){
                        $datalist[]=$state->name;
                    }
                    // foreach($cities as $city){
                    //     $datalist[]=$city->name .', '.$city->state->name;
                    // }

                $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                foreach($datalist as $row)
                {
                    $output .= '
                    <li><a href="#" class="text-dark px-2" style="font-size: small">'.$row.'</a></li>
                    ';
                }
                $output .= '</ul>';
                echo $output;
            } 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DemandTrend $demandTrend)
    {
        
        $data = [];
        $data['title'] = $request->input('title');
        $data['category'] = $request->input('category');
        $data['type'] = $request->input('type');
        $data['bed'] = $request->input('bed');


        if( preg_match("/,/i", $data['title']) || !$data['title'] ){
            // dd("Area is not available");
            return redirect()->route('property.DemandTrends');
        } else {
            
            $states = State::where('name','LIKE','%'.$data['title'].'%')->get();
            
            $trends = DemandTrend::with('cities')
                     ->select('city_id', DB::raw( '(COUNT(city_id)) as Count'))
                    ->where('city_id', '!=','null' )
                    ->when($states, function ($query) use ($states) {
                        $query->where('state_id', '=', $states[0]->id );
                    })
                    
                    // -- type
                    ->when($data['type'], function ($query) use ($data) {
                        $query->where('type', '=', $data['type'] );
                    })

                    // -- category
                    ->when($data['category'], function ($query) use ($data) {
                        $query->where('category_id', '=', $data['category'] );
                    })

                     // -- Bedroom
                     ->when($data['bed'], function ($query) use ($data) {
                        $query->where('bed_id', '=', $data['bed'] );
                    })
                    
                    // ->where('state_id', '=', $states->id )
                    ->groupBy('city_id')
                    ->orderBy('Count', 'desc')
                    ->get();
                    
            $topname = DB::table('states')->select('name')->where('id','=',$states[0]->id)->get();
            $heading = "Localties";
            $rank = 1; $count = 0; $percent = 0;
            foreach($trends as $trend){ $count+=$trend->Count; }
            if ($count != 0){ $percent = (100/$count); }
            return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

        }
        return redirect()->route('property.DemandTrends');
        // if( $data['category']=="" && $data['type'] == "" && $data['bed']=="" && $data['title'] ){
         
        //     if( preg_match("/,/i", $data['title']) ){
        //         // dd("Area is not available");
        //         return redirect()->route('property.DemandTrends');
        //     } else {
                
        //         $states = State::where('name','LIKE','%'.$data['title'].'%')->get();
        //         $trends = DemandTrend::with('cities')
        //                 ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
        //                 ->where('city_id', '!=','null' )
        //                 ->when($states, function ($query) use ($states) {
        //                     $query->where('state_id', '=', $states[0]->id );
        //                 })
        //                 // ->where('state_id', '=', $states->id )
        //                 ->groupBy('city_id')
        //                 ->orderBy('Count', 'desc')
        //                 ->get();

        //         $topname = DB::table('states')->select('name')->where('id','=',$states[0]->id)->get();
        //         $heading = "Localties";
        //         $rank = 1; $count = 0; $percent = 0;
        //         foreach($trends as $trend){ $count+=$trend->Count; }
        //         if ($count != 0){ $percent = (100/$count); }
        //         return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

        //     }

        // }elseif($data['category']=="" && $data['type'] && $data['bed']=="" && $data['title']){
                    
        //     if( preg_match("/,/i", $data['title']) ){
        //         // dd("Area is not available");
        //         return redirect()->route('property.DemandTrends');

        //     } else {
        //         $states = State::where('name','=',$data['title'])->get();
        //         $trends = DemandTrend::with('cities')
        //                 ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
        //                 ->where('city_id', '!=','null' )
        //                 ->where('type','=', $data['type'])   
        //                 ->where('state_id', '=', $states[0]->id )
        //                 ->groupBy('city_id')
        //                 ->orderBy('Count', 'desc')
        //                 ->get();

        //         $topname = DB::table('states')->select('name')->where('id','=',$states[0]->id)->get();
        //         $heading = "Localties";
        //         $rank = 1; $count = 0; $percent = 0;
        //         foreach($trends as $trend){ $count+=$trend->Count; }
        //         if ($count != 0){ $percent = (100/$count); }
        //         return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

        //     }
            
        // }elseif($data['category'] && $data['type']== "" && $data['bed']=="" && $data['title']){
            
        //     if( preg_match("/,/i", $data['title']) ){
        //         // dd("Area is not available");
        //         return redirect()->route('property.DemandTrends');

        //     } else {
        //         $states = State::where('name','=',$data['title'])->get();
        //         $trends = DemandTrend::with('cities')
        //                 ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
        //                 ->where('city_id', '!=','null' )
        //                 ->where('category_id','=', $data['category'])
        //                 ->where('state_id', '=', $states[0]->id )
        //                 ->groupBy('city_id')
        //                 ->orderBy('Count', 'desc')
        //                 ->get();
                
        //         $topname = DB::table('states')->select('name')->where('id','=',$states[0]->id)->get();
        //         $heading = "Localties";
        //         $rank = 1; $count = 0; $percent = 0;
        //         foreach($trends as $trend){ $count+=$trend->Count; }
        //         if ($count != 0){ $percent = (100/$count); }
        //         return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

        //     }

        // } elseif($data['category']=="" && $data['type'] && $data['bed'] && $data['title']){
        //     if( preg_match("/,/i", $data['title']) ){
        //         // dd("Area is not available");
        //         return redirect()->route('property.DemandTrends');

        //     } else {
        //         $states = State::where('name','=',$data['title'])->get();
        //         $trends = DemandTrend::with('cities')
        //                 ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
        //                 ->where('city_id', '!=','null' )
        //                 ->where('bed_id','=', $data['bed'])
        //                 ->where('type', '=', $data['type'])
        //                 ->where('state_id', '=', $states[0]->id )
        //                 ->groupBy('city_id')
        //                 ->orderBy('Count', 'desc')
        //                 ->get();

        //         $topname = DB::table('states')->select('name')->where('id','=',$states[0]->id)->get();
        //         $heading = "Localties";
        //         $rank = 1; $count = 0; $percent = 0;
        //         foreach($trends as $trend){ $count+=$trend->Count; }
        //         if ($count != 0){ $percent = (100/$count); }
        //         return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

        //     }

        // }elseif($data['category'] && $data['type'] && $data['bed'] && $data['title']){

        //     if( preg_match("/,/i", $data['title']) ){
        //         // dd("Area is not available");
        //         return redirect()->route('property.DemandTrends');

        //     } else {
        //         $states = State::where('name','=',$data['title'])->get();
        //         $trends = DemandTrend::with('cities')
        //                 ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
        //                 ->where('city_id', '!=','null' )
        //                 ->where('bed_id','=', $data['bed'])
        //                 ->where('category_id', '=', $data['category'])
        //                 ->where('type', '=', $data['type'])
        //                 ->where('state_id', '=', $states[0]->id )
        //                 ->groupBy('city_id')
        //                 ->orderBy('Count', 'desc')
        //                 ->get();
        //         $topname = DB::table('states')->select('name')->where('id','=',$states[0]->id)->get();
        //         $heading = "Localties";
        //         $rank = 1; $count = 0; $percent = 0;
        //         foreach($trends as $trend){ $count+=$trend->Count; }
        //         if ($count != 0){ $percent = (100/$count); }
        //         return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

        //     }

        // } else {
        //     // dd("nothing to select");
        //     return redirect()->route('property.DemandTrends');

            
        // }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandTrend $demandTrend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandTrend $demandTrend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandTrend $demandTrend)
    {
        //
    }

    public function StateTrend($state){

        $trends = DemandTrend::with('cities')
            ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
            ->where('city_id', '!=','null' )
            ->where('state_id', '=', $state )
            ->groupBy('city_id')
            ->orderBy('Count', 'desc')
            ->get();
        
        $topname = DB::table('states')->select('name')->where('id','=',$state)->get();
        $heading = "Localties";

        $rank = 1; $count = 0; $percent = 0;
        foreach($trends as $trend){ $count+=$trend->Count; }
        
        if($count > 0){
            $percent = (100/$count);
        }
        
        return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

    }

    public function CityTrend($state){
        
        $trends = DemandTrend::with('cities')
                            ->select( 'city_id', DB::raw( '(COUNT(city_id)) as Count'))
                            ->where('city_id', '!=','null' )
                            ->where('state_id', '=', $state )
                            ->groupBy('city_id')
                            ->orderBy('Count', 'desc')
                            ->get();
                            
        $topname = DB::table('states')->select('name')->where('id','=',$state)->get();
        $heading = "Localties";
        $rank = 1; $count = 0; $percent = 0;
        foreach($trends as $trend){ $count+=$trend->Count; }
        
        if($count > 0){
            $percent = (100/$count);
        }
        return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));
    }

    public function AreaTrend($city){

        $trends = DemandTrend::with('cities')
        ->select( 'area', DB::raw( '(COUNT(area)) as Count'))
        ->where('area', '!=','null' )
        ->where('city_id', '=', $city)
        ->groupBy('area')
        ->orderBy('Count', 'desc')
        ->get();
        

        if( $trends->isEmpty() ){
            // echo "dfsdf";
            // dd("dfgdfgd");
            // return Redirect::back();
            return redirect()->route('property.DemandTrends');
        }

        // exit;


        $topname = DB::table('cities')->select('name')->where('id','=',$city)->get();
        $heading = "Areas";
        // dd($topname);
        $rank = 1; $count = 0; $percent = 0;
        foreach($trends as $trend){ $count+=$trend->Count; }
        
        if($count > 0){
            $percent = (100/$count);
        }
        
        return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));
    }


    public function CategoryTrend($category){

        $trends = DemandTrend::with('states')
            ->select( 'state_id', DB::raw( '(COUNT(state_id)) as Count'))
            ->where('state_id', '!=','null' )
            ->where('category_id','=',$category)
            ->groupBy('state_id')
            ->orderBy('Count', 'desc')
            ->get();                            

        $topname="Nigeria";
        $heading = "States";

        $rank = 1; $count = 0; $percent = 0;
        foreach($trends as $trend){
        $count+=$trend->Count; 
        }
        
        if($count > 0){
        $percent = (100/$count);
        }

        return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));

    }
    
    public function TypeTrend($type){

        $trends = DemandTrend::with('states')
                ->select( 'state_id', DB::raw( '(COUNT(state_id)) as Count'))
                ->where('state_id', '!=','null' )
                ->where('type','=',$type)
                ->groupBy('state_id')
                ->orderBy('Count', 'desc')
                ->get();                            

        $topname= "for ".$type." Nigeria";
        $heading = "States";
        $rank = 1; $count = 0; $percent = 0;
        foreach($trends as $trend){
        $count+=$trend->Count; 
        }
        
        if($count > 0){
            
        $percent = (100/$count);
        }


        return view('frontend.demand-list', compact('topname','heading','rank', 'percent','count', 'trends'));        

    }

}

