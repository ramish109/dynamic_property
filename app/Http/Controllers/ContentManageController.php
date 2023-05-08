<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\ContentManage;
use App\Http\Requests\StoreContentManageRequest;
use App\Http\Requests\UpdateContentManageRequest;

class ContentManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreContentManageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentManageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentManage  $contentManage
     * @return \Illuminate\Http\Response
     */
    public function show(ContentManage $contentManage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentManage  $contentManage
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentManage $contentManage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentManageRequest  $request
     * @param  \App\Models\ContentManage  $contentManage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentManageRequest $request, ContentManage $contentManage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentManage  $contentManage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentManage $contentManage)
    {
        //
    }
    
    public function ContentCreate($value){
        return view('admin.content-manage.create',compact('value'));
    }

    // Create all links in database
    public function ContentStore(Request $request){
    
        if($request->type){
            $data=[];
            $data['title'] = $request->input('title');
            $data['type'] = $request->input('type');
            $data['link'] = $request->input('link');
            $data['content'] = $request->input('content');
            $data['status'] = 1;
            $content = ContentManage::create($data);

        } else {
            notify()->info('System is under maintenance!');
            return redirect()->back();
        }

          if($request->type == "company"){           
            notify()->success('Comapny link Created Successfully!');
            return redirect()->route('admin.comapnyshow');
        }elseif($request->type == "otherlink"){
            notify()->success('Other link Created Successfully!');
            return redirect()->route('admin.otherlinkshow');
        }elseif($request->type == "location"){
            notify()->success('Location link Created Successfully!');
            return redirect()->route('admin.locationlinkshow');
        }elseif($request->type == "trend"){
            notify()->success('Trend Link Created Successfully!');
            return redirect()->route('admin.trendlinkshow');
        }else{
            return redirect()->back();
        }


    }

    public function CompanyShow(){
        $companies = ContentManage::where('type','company')->get();
        return view('admin.content-manage.company', compact('companies')); 
    }

    public function OtherLinkShow(){
        $links = ContentManage::where('type','otherlink')->get();
        return view('admin.content-manage.otherlink',compact('links'));
    }

    public function LocationLinkShow(){
        $locations = ContentManage::where('type','location')->get();
        return view('admin.content-manage.location', compact('locations'));
    }
    
    public function TrendLinkShow(){
        $trends = ContentManage::where('type','trend')->get();
        return view('admin.content-manage.trend', compact('trends')); 
    }

    // destory link for all linkroutes
    public function LinkDestroy($id){

        $link = ContentManage::find($id);
        $link->delete();

        notify()->success('Link deleted successfully!');
        return redirect()->back();
    }

}
