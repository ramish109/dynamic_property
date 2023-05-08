<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\Session;
use Spatie\Analytics\Period;
use Analytics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
  
    
        if($user->is_email_verified == 0){
        
            $email = $user->email;

            //temparary email
            $user_id = User::find($user->id);
            $user_id->is_email_verified =1;
            $user_id->save();
            //temp end
            
            // return view('auth.verify-email', compact('email'));
        }
    

    
        if($user->type == 'admin')
        {
            $allProperties = Property::where('moderation_status',1)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->get();
            $newsCount = Blog::where('status','approved')->count();
        }
        if($user->type == 'user')
        {
            $allProperties = Property::where('moderation_status',1)->where('user_id',$user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->where('user_id',$user->id)->get();
            $newsCount = Blog::where('status','approved')->where('user_id',$user->id)->count();

        } 
        
           // inertiasoft
        if($user->type == 'builder')
        {
            $allProperties = Property::where('moderation_status',1)->where('user_id',$user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->where('user_id',$user->id)->get();
            $newsCount = Blog::where('status','approved')->where('user_id',$user->id)->count();

        }
        
        
        if($user->type == 'individual')
        {
           
            $allProperties = Property::where('moderation_status',1)->where('user_id',$user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->where('user_id',$user->id)->get();
            $newsCount = Blog::where('status','approved')->where('user_id',$user->id)->count();
        }

        if($user->type == 'owner')
        {
            $allProperties = Property::where('moderation_status',1)->where('user_id',$user->id)->get();
            $properties = Property::with(['facilities.facilityTranslation','user','category.categoryTranslation','country.countryTranslation','state.stateTranslation','city.cityTranslation','propertyTranslation','propertyTranslationEnglish','image','propertyDetails'])->where('moderation_status',1)->where('user_id',$user->id)->get();
            $newsCount = Blog::where('status','approved')->where('user_id',$user->id)->count();

        }


        $propertyCount  = $allProperties->count();
        $result = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $browsers = Analytics::fetchTopBrowsers(Period::days(7));
        $topVisitedPages = Analytics::fetchMostVisitedPages(Period::days(7))->take(10);
        $topReferrers = Analytics::fetchTopReferrers(Period::days(7))->take(10);
        $newUsers = Analytics::fetchUserTypes(Period::days(7));
        // dd($topVisitedPages);
        $locale   = Session::get('currentLocal');
        return view('admin.dashboard',compact('user','propertyCount','result','properties','locale','newsCount','browsers','topVisitedPages','topReferrers','newUsers'));
    }

    public function chart()
    {
        $result = Analytics::fetchTotalVisitorsAndPageViews(Period::days(10));

        return response()->json($result);

    }

       public function emailtoken(Request $request){
        // $data = $request->all();
        $user = auth()->user();
        
        // dd($user->email_verified_token);
        // dd($request->token);
        
        if($user->email_verified_token == $request->token){            
            DB::table('users')->where('id', $user->id)->update(['is_email_verified' => 1]);
            return redirect()->route('admin.dashboard');
        } 
        return redirect()->back()->with('message', 'verify Code is Wrong');
        
    }
}
