<?php 

namespace App\Http\Controllers;

use App\Models\PropertyRequest;
use App\Http\Requests\StorePropertyRequestRequest;
use App\Http\Requests\UpdatePropertyRequestRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\PropertyDetail;
use App\Models\PropertyTranslation;
use App\Models\SiteInfo;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ViewModels\ICityModel;
use App\ViewModels\ICityTranslationModel;
use App\ViewModels\ICountryTranslationModel;
use App\ViewModels\IStateTranslationModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyRequestController extends Controller 
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PropertyRequest::with('category','city')->get();    
        if (Auth::user() && Auth::user()->is_email_verified == 1) {

            return redirect()->route('admin.property-request.index');
        }
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::with('countryTranslation')->where('id',2)->get()->keyBy('id');
        $city = City::with('cityTranslation')->get()->keyBy('id');
        $users = User::where('type','user')->get()->keyBy('id');
        $states = State::with('stateTranslation')->where('status',1)->get()->keyBy('id');
        $categories = Category::with('categoryTranslation')->where('status',1)->get()->keyBy('id');

        return view('frontend.post-request', compact('categories','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {        
        $data = $request->all();
            PropertyRequest::create([
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id'],
            'type' => $data['type'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'bed' => $data['bed'],
            'budget' => $data['budget'],
            'comments' => $data['comments'],
            'name' => $data['name'],
            'user_type' => $data['user_type'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => 0,
        ]);

        return redirect()->back()->with('success', 'Sent Successfully.');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyRequest  $propertyRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyRequest $propertyRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyRequest  $propertyRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyRequest $propertyRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequestRequest  $request
     * @param  \App\Models\PropertyRequest  $propertyRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequestRequest $request, PropertyRequest $propertyRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyRequest  $propertyRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyRequest $propertyRequest)
    {
        //
    }

    public function getState(Request $request)
    {
        App::setLocale(Session::get('currentLocal'));
        $states = State::with('stateTranslation')->where('country_id',$request->country)->get();
        echo '<option value="">Select State</option>';
        foreach ($states as $state){
             echo '<option value="'.$state->id.'">'.$state->stateTranslation->name.'</option>';
        }
    }

    public function getCity(Request $request)
    { 

        App::setLocale(Session::get('currentLocal'));
        $cities = City::with('cityTranslation')->where('state_id',$request->state)->get();
        echo '<option value="0">Select City</option>';
        foreach ($cities as $city){
            echo '<option value="'.$city->id.'">'.$city->cityTranslation->name.'</option>';
        }
    }


}
