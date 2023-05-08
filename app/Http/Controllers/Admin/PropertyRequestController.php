<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\PropertyRequest;
use App\Models\PackageUser;
use App\Models\User; 
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Country; 
use App\Models\State;
use App\Models\City;
use Auth;

use Illuminate\Http\Request;

class PropertyRequestController extends Controller
{
 

    // private $_PropertyRequestModel;
    // public function __construct(IPropertyRequestModel $model)
    // {
    //     $this->_PropertyRequestModel = $model;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $auth = Auth::user();
        if($auth->type == 'admin'){
            $requests = PropertyRequest::with('category','city')->get();
        }else {
            $requests = PropertyRequest::with('category','city')->where('status',1)->get();

        }

        return view('admin.property-request.index', compact('requests'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = Auth::user();
        $currentDate = date('Y-m-d');
        $pkg_user = PackageUser::where('user_id', $auth->id)->where('expire_at','>',$currentDate)->get();
        
        if($pkg_user->isEmpty()){
            notify()->info('Please Purchase Package for Request view');
            return redirect()->route('admin.credits.index');
        }else{       
            $properties = PropertyRequest::with('category','city','state')->where('id',$id)->get();
            return view('admin.property-request.show', compact('properties'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requests = PropertyRequest::with('category','city')->where('id',$id)->get();
        
        // dd($requests[0]->id);
        $countries = Country::where('status','=',1)->get();
        $states = State::where('status','=',1)->get();
        $cities = City::where('status','=',1)->get();
        $categories = Category::where('status','=',1)->get();

        return view('admin.property-request.edit',compact('countries','states','cities','categories','requests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $data = PropertyRequest::find($id);
        $data->status = $request->status;
        $data->update();

        return redirect()->back()->with('success',' Approve Successfully');

        // dd($request->all());


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $data = PropertyRequest::find($id);
        $data->delete();

        return redirect()->back()->with('success',' Deleted Successfully');

    }
}
