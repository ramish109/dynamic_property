<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Project;
use App\Models\PackageUser;
use App\ViewModels\ICategoryTranslationModel;
use App\ViewModels\ICityTranslationModel;
use App\ViewModels\ICountryTranslationModel;
use App\ViewModels\ICurrencyModel;
use App\ViewModels\IFacilityTranslationModel;
use App\ViewModels\IPackageUserModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use auth;
use App\ViewModels\IPropertyModel;
use App\ViewModels\IPropertyTranslationModel;
use App\ViewModels\IStateTranslationModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{

    private $_propertyModel;
    private $_propertyTranslationModel;
    private $_categoryTranslationModel;
    private $_facilityTranslationModel;
    private $_countryTranslationModel;
    private $_stateTranslationModel; 
    private $_cityTranslationModel;
    private $_packageUserModel; 
    private $_currencyModel;
    public function __construct(IPackageUserModel $packageUserModel,
                                IPropertyModel $propertyModel,
                                IPropertyTranslationModel $propertyTranslationModel,
                                ICategoryTranslationModel $categoryTranslationModel,
                                IFacilityTranslationModel $facilityTranslationModel,
                                ICountryTranslationModel $countryTranslationModel,
                                IStateTranslationModel $stateTranslationModel,
                                ICityTranslationModel $cityTranslationModel,
                                ICurrencyModel $currencyModel)
    {
        $this->middleware('credit', ['except' => ['index','edit','update','myProperties']]);   

        $this->_propertyModel = $propertyModel;
        $this->_propertyTranslationModel = $propertyTranslationModel;
        $this->_categoryTranslationModel = $categoryTranslationModel;
        $this->_facilityTranslationModel = $facilityTranslationModel;
        $this->_countryTranslationModel = $countryTranslationModel;
        $this->_stateTranslationModel = $stateTranslationModel;
        $this->_cityTranslationModel = $cityTranslationModel;
        $this->_packageUserModel = $packageUserModel;
        $this->_currencyModel = $currencyModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auth = Auth::user();
        if($auth->type == 'admin'){
            $projects = Project::with(['country','state','city','category','user', 'currency', 'package', 'facilities' ])->get();
        }elseif($auth->type == 'builder'){
            $projects = Project::with(['country','state','city','category','user', 'currency', 'package', 'facilities' ])->where('user_id', $auth->id)->get();
        }

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        App::setLocale(Session::get('currentLocal'));
        $categories = $this->_categoryTranslationModel->getByLocale();
        $facilities = $this->_facilityTranslationModel->getByLocale();
        $packages = $this->_packageUserModel->getPackages();
        $countries = $this->_countryTranslationModel->getByLocale();
        $currencies = $this->_currencyModel->getAllCurrencies();

        return view('admin.projects.create',compact('currencies','categories','facilities','packages','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ProjectDetail = [];
        $ProjectDetail['user_id'] = $request->input('user_id');
        $ProjectDetail['title'] = $request->input('title');
        $ProjectDetail['package_id'] = $request->input('package_id');
        $ProjectDetail['category_id'] = $request->input('category_id');
        $ProjectDetail['country_id'] = $request->input('country_id');
        $ProjectDetail['state_id'] = $request->input('state_id');
        $ProjectDetail['city_id'] = $request->input('city_id');
        $ProjectDetail['lat'] = $request->input('lat');
        $ProjectDetail['lon'] = $request->input('lon');
        $ProjectDetail['price'] = $request->input('price');
        $ProjectDetail['installment'] = 10000;
        $ProjectDetail['currency_id'] = $request->input('currency_id');
        $ProjectDetail['is_featured'] = $request->input('is_featured');
        $ProjectDetail['bed'] = $request->input('bed');
        $ProjectDetail['bath'] = $request->input('bath');
        $ProjectDetail['garage'] = $request->input('garage');
        $ProjectDetail['floor'] = $request->input('floor');
        $ProjectDetail['room_size'] = $request->input('room_size');
        $ProjectDetail['status'] = $request->input('status');
        $json = json_encode($request->input('facility_id'));
        $ProjectDetail['facility_id'] = $json;
        $ProjectDetail['description'] = $request->input('description');

        
        $thumb_name = null;
        $image_json = null;
        if($request->hasfile('thumbnail')) {

            foreach($request->file('images') as $file)
            {
                
                Carbon::now()->toDateString();
                $name = 'gallery-'.uniqid();
                $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/gallery/'  .  $name . '.jpg'));
                $imgData[] = $galleryImage->basename;
                $photo = $galleryImage->basename;
                $destinationPath = $galleryImage->dirname;
                $file->move($destinationPath,$photo);
            }

            $file = $request->file('thumbnail');
            $image_json = json_encode($imgData, true);
            Carbon::now()->toDateString();
            $thumbnail = 'thumbnail-'.uniqid();
            $ThumbnailImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/thumbnail/'  .  $thumbnail . '.jpg'));
            $thumb_name = $ThumbnailImage->basename;
            $path = $ThumbnailImage->dirname;
            $file->move($path,$thumb_name);
        }

        $ProjectDetail['thumbnail'] = $thumb_name;
        $ProjectDetail['image_path'] = $image_json;

        $item = Project::create($ProjectDetail);
        
        $pkg_user = PackageUser::where('id',$request->input('package_id'))->get()->first();
        $item = $pkg_user->item-1;
        PackageUser::where('id', $request->input('package_id'))->update(['item' => $item]);

        notify()->success('Project created Successfullly');
        return redirect()->route('admin.projects.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $user = auth()->user();
        $categories = $this->_categoryTranslationModel->getByLocale();
        $facilities = $this->_facilityTranslationModel->getByLocale();
        $package_user = $this->_packageUserModel->getByUser($user->id);
        $packages = $this->_packageUserModel->getPackages();
        $countries = $this->_countryTranslationModel->getByLocale();
        $states = $this->_stateTranslationModel->getByLocale();
        $cities = $this->_cityTranslationModel->getByLocale();
        $currencies = $this->_currencyModel->getAllCurrencies();
        //$project = Project::with(['country','state','city','category','user', 'currency', 'package', 'facilities' ])->where('id',$id)->get();
        
        if($user->type == 'admin'){
            $project = Project::with(['country','state','city','category','user', 'currency', 'package', 'facilities' ])
            ->where('id',$id)->get();
        }else{
            $project = Project::with(['country','state','city','category','user', 'currency', 'package', 'facilities' ])
            ->where('user_id',$user->id)
            ->where('id',$id)->get();
        }

        if($project->isEmpty()){
            return redirect()->route('admin.projects.index');
        }
        
        return view('admin.projects.edit',compact('project','currencies','user','categories','facilities','package_user','packages','countries','states','cities','locale'));
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

        $ProjectDetail = [];
        $ProjectDetail['user_id'] = $request->input('user_id');
        $ProjectDetail['title'] = $request->input('title');
        $ProjectDetail['package_id'] = $request->input('package_id');
        $ProjectDetail['category_id'] = $request->input('category_id');
        $ProjectDetail['country_id'] = $request->input('country_id');
        $ProjectDetail['state_id'] = $request->input('state_id');
        $ProjectDetail['city_id'] = $request->input('city_id');
        $ProjectDetail['lat'] = $request->input('lat');
        $ProjectDetail['lon'] = $request->input('lon');
        $ProjectDetail['price'] = $request->input('price');
        $ProjectDetail['installment'] = 10000;
        $ProjectDetail['currency_id'] = $request->input('currency_id');
        $ProjectDetail['is_featured'] = $request->input('is_featured');
        $ProjectDetail['bed'] = $request->input('bed');
        $ProjectDetail['bath'] = $request->input('bath');
        $ProjectDetail['floor'] = $request->input('floor');
        $ProjectDetail['room_size'] = $request->input('room_size');
        $ProjectDetail['status'] = $request->input('status');
        $json = json_encode($request->input('facility_id'));
        $ProjectDetail['facility_id'] = $json;
        $ProjectDetail['description'] = $request->input('description');


        if($request->hasfile('images')) {
    
            foreach($request->file('images') as $file)
            {
                Carbon::now()->toDateString();
                $name = 'gallery-'.uniqid();
                $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/gallery/'  .  $name . '.jpg'));
                $imgData[] = $galleryImage->basename;
                $photo = $galleryImage->basename;
                $destinationPath = $galleryImage->dirname;
                $file->move($destinationPath, $photo);
            }
            
            $finalImages = array_merge($request->input('oldImages'), $imgData);
            $image_json = json_encode($finalImages);
            $ProjectDetail['image_path'] = $image_json;

        }else{
            $oldImages = json_encode($request->input('oldImages'));
            $ProjectDetail['image_path'] = $oldImages;
        }
        if($request->hasfile('thumbnail')) {            
            $file = $request->file('thumbnail');
            Carbon::now()->toDateString();
            $thumbnail = 'thumbnail-'.uniqid();
            $thumbnailImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/thumbnail/'  .  $thumbnail . '.jpg'));
            $thumbData[] = $thumbnailImage->basename;
            $image = $thumbnailImage->basename;
            $destinationPath2 = $thumbnailImage->dirname;
            $file->move($destinationPath2,$image);
            
            // $thumb_json = json_encode($image, true);
            $ProjectDetail['thumbnail'] = $image;
            
        }else{
            $ProjectDetail['thumbnail'] = $request->input('old_thumbnail');
        }
    

        $updateProject = Project::find($id)->update($ProjectDetail);        
        // $item = Project::create($ProjectDetail);
        notify()->success('Project Updated Successfullly');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $project= Project::find($id);
        $project->delete();

        notify()->success('Project deleted Successfully');
        return redirect()->route('admin.projects.index');
       
    }
}
