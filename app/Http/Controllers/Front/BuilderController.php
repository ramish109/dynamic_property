<?php

namespace App\Http\Controllers\Front;
 
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Chat;
use App\Models\HeaderImage; 
use App\Models\Property;
use App\Models\Project;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class BuilderController extends Controller
{

    //
    public function index(){
        
        App::setLocale(Session::get('currentLocal'));

        $builders = User::where('type','builder')->get();
        $categories = Category::with('categoryTranslation','properties')->where('status',1)->get();
        $recentlyAdded = Property::with('state.stateTranslation','city.cityTranslation','propertyTranslation')->where('moderation_status',1)->where('status',1)->latest()->take(5)->get();
        $headerImage = HeaderImage::where('page', 'agents')->first();

        return view('frontend.builder-list',compact('builders','categories','recentlyAdded','headerImage'));

    }

    public function show(User $builder)
    {

        App::setLocale(Session::get('currentLocal'));

        $recentlyAdded = Property::with(['state.stateTranslation','city.cityTranslation','propertyTranslation'])->where('moderation_status',1)->where('status',1)->latest()->take(5)->get();
        $categories = Category::with('categoryTranslation','properties')->where('status',1)->get();
        $properties = Property::with(['propertyDetails','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image'])
                                ->where('moderation_status',1)
                                ->where('status',1)
                                ->where('user_id',$builder->id)
                                ->get();
        $headerImage = HeaderImage::where('page','single-agent')->first();

        $projects = Project::with(['city', 'state', 'country', 'category'])->where('user_id','=', $builder->id)->where('status',1)->get();

        return view('frontend.builder',compact('builder','recentlyAdded','categories','properties','projects','headerImage'));
    }

}
