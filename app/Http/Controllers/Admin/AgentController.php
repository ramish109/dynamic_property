<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ViewModels\IUserModel;
use App\Models\User;
use App\ViewModels\IUserTranslationModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AgentController extends Controller 
{
    private $_userModel;
    private $_userTranslationModel;
    public function __construct(IUserModel $model,IUserTranslationModel $userTranslationModel)
    {
        
        $this->_userModel = $model;
        $this->_userTranslationModel = $userTranslationModel;
       
        $this->middleware('auth');
        // $this->middleware('admin');
       
       
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            return $this->_userModel->getAll($request);
        }
        return view('admin.agents.index', compact('user'));
    }

    public function create()
    {
        return view('admin.agents.create');
    }

    public function store(Request $request)
    {
        $this->_userModel->add($request); 
        notify()->success('User Created Successfully!');

        return redirect()->route('admin.agents.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $agent = $this->_userModel->getById($id);
        $locale = Session::get('currentLocal');
        return view('admin.agents.edit',compact('agent','locale'));
    }

   function update(Request $request, $id)
    {

        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.agents.index');
        }else{

            
            // gallery image save start
            if($request->hasfile('image')) {
                
                    $file = $request->file('image');
                    Carbon::now()->toDateString();
                    $name = 'gallery-'.uniqid();
                    $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/users/'.$name . '.jpg'));
                    $imgData = $galleryImage->basename;

                $imgData = json_encode($imgData);
                $request->request->add(['image' => $imgData ]);
            } 
             // End gallery image save start
            $this->_userModel->update($request,$id);
            $this->_userTranslationModel->update($request,$id);
            notify()->success('User Information Updated Successfully!');
            return redirect()->route('admin.agents.index');
        }
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.agents.index');
        }else{
            $this->_userModel->delete($id);
            $this->_userTranslationModel->delete($id);
            notify()->success('User Deleted Successfully!');
        }
        return redirect()->route('admin.agents.index');
    }
    
    
    // Builder Management functions start
    public function builderShow(){
        $builders = User::where('type', 'builder')->get();
        return view('admin.builders.index',compact('builders'));
    }

    public function builderEdit($id){
        $builder = $this->_userModel->getById($id);
        $locale = Session::get('currentLocal');
        return view('admin.builders.edit',compact('builder','locale'));
    }

    public function builderUpdate(Request $request, $id){    
       
         // gallery image save start
         if($request->hasfile('image')) {

            $file = $request->file('image');
            Carbon::now()->toDateString();
            $name = 'gallery-'.uniqid();
            $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/users/'.$name . '.jpg'));
            $imgData = $galleryImage->basename;

        $imgData = json_encode($imgData);
        $request->request->add(['image' => $imgData ]);
        } 
        // End gallery image save start

        $this->_userModel->update($request,$id);
        $this->_userTranslationModel->update($request,$id);
        notify()->success('Builder Information Updated Successfully!');
        return redirect()->route('admin.buildershow');
    }

    public function builderCreate(){
        return view('admin.builders.create');
    }

    public function builderStore(Request $request){
        $this->_userModel->add($request); 
        notify()->success('Builder Created Successfully!');
        return redirect()->route('admin.buildershow');
    }

    public function builderDestroy($id){
        $this->_userModel->delete($id);
        $this->_userTranslationModel->delete($id);
        notify()->success('Builder Deleted Successfully!');
        return redirect()->route('admin.buildershow');
    }
    // Builder Management functions start


    // Individual Management functions start
    public function individualShow(){
        $individuals = User::where('type', 'individual')->get();
        return view('admin.individuals.index',compact('individuals'));
    }

    public function individualCreate(){
        return view('admin.individuals.create');
    }

    public function individualStore(Request $request){
    
        $this->_userModel->add($request); 
        notify()->success('Individual Created Successfully!');
        return redirect()->route('admin.individualshow');
    }

    
    public function individualEdit($id){
        $individual = $this->_userModel->getById($id);
        $locale = Session::get('currentLocal');
        return view('admin.individuals.edit',compact('individual','locale'));
    }


    public function individualUpdate(Request $request, $id){    
        
            // gallery image save start
            if($request->hasfile('image')) {
        
                $file = $request->file('image');
                Carbon::now()->toDateString();
                $name = 'gallery-'.uniqid();
                $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/users/'.$name . '.jpg'));
                $imgData = $galleryImage->basename;

                $imgData = json_encode($imgData);
                $request->request->add(['image' => $imgData ]);
            } 
        // End gallery image save start


        $this->_userModel->update($request,$id);
        $this->_userTranslationModel->update($request,$id);
        notify()->success('Individual Information Updated Successfully!');
        return redirect()->route('admin.individualshow');
    }

    public function individualDestroy($id){
        $this->_userModel->delete($id);
        $this->_userTranslationModel->delete($id);
        notify()->success('Individual Deleted Successfully!');
        return redirect()->route('admin.individualshow');
    }
    // Individual Management functions end


    // Owner Management functions start
    public function ownerShow(){
        $owners = User::where('type', 'owner')->get();
        return view('admin.owners.index',compact('owners'));
    }

    public function ownerEdit($id){
        $owner = $this->_userModel->getById($id);
        $locale = Session::get('currentLocal');
        return view('admin.owners.edit',compact('owner','locale'));
    }

    public function ownerUpdate(Request $request, $id){    
        
        
        // gallery image save start
        if($request->hasfile('image')) {
                
            $file = $request->file('image');
            Carbon::now()->toDateString();
            $name = 'gallery-'.uniqid();
            $galleryImage = \Intervention\Image\Facades\Image::make($file)->encode('jpg', 90)->fit(750, 500)->save(public_path('images/users/'.$name . '.jpg'));
            $imgData = $galleryImage->basename;

        $imgData = json_encode($imgData);
        $request->request->add(['image' => $imgData ]);
        } 
        // End gallery image save start

        $this->_userModel->update($request,$id);
        $this->_userTranslationModel->update($request,$id);
        notify()->success('Owner Information Updated Successfully!');
        return redirect()->route('admin.ownershow');
    }

    public function ownerCreate(){
        return view('admin.owners.create');
    }

    public function ownerStore(Request $request){
        $this->_userModel->add($request); 
        notify()->success('Owner Created Successfully!');
        return redirect()->route('admin.ownershow');
    }

    public function ownerDestroy($id){
        $this->_userModel->delete($id);
        $this->_userTranslationModel->delete($id);
        notify()->success('Owner Deleted Successfully!');
        return redirect()->route('admin.ownershow');
    }
    // Owner Management functions start


    
}
