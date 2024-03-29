<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageUser;
use App\ViewModels\PackageModel;
use App\ViewModels\PackageTranslationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\DB;


class PackageController extends Controller
{
    private $_packageModel;
    private $_packageTranslationModel;
    public function __construct(PackageModel $model,PackageTranslationModel $translationModel)
    {
        $this->middleware('admin');
        $this->_packageModel = $model;
        $this->_packageTranslationModel = $translationModel;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->_packageModel->getAll($request);
        }

        return view('admin.packages.index');
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        
        $this->_packageModel->add($request);
        notify()->success('Package added successfully!');
        return redirect()->route('admin.packages.index');
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

    public function edit($id)
    {
        App::setLocale(Session::get('currentLocal'));
        $locale   = Session::get('currentLocal');
        $package = $this->_packageModel->getById($id);
        $packageTranslation = $this->_packageTranslationModel->getById($id);
        return view('admin.packages.edit',compact('package','packageTranslation','locale'));
    }

    public function update(Request $request, $id)
    {
        if(!env('USER_VERIFIED'))
        {
            notify()->error('This feature is disable for demo!');
            return redirect()->route('admin.packages.index');
        }else{
            $this->_packageModel->update($request,$id);
            $this->_packageTranslationModel->update($request,$id);
            notify()->success('Package updated successfully!');
            return redirect()->route('admin.packages.index');
        }


    }

    public function destroy($id)
    {
        // dd($id);
        $currentDate = date('Y-m-d');
        $pkg_user = PackageUser::where('package_id',$id)->where('expire_at','>',$currentDate)->get();

        if(! $pkg_user->isEmpty()){

            $expire = $pkg_user[0]['expire_at'];
            if($expire >= $currentDate){
                notify()->warning('This Package is in used ');
                return redirect()->route('admin.packages.index');

            }
        } else {
            

            if(!env('USER_VERIFIED'))
            {
                notify()->error('This feature is disable for demo!');
                return redirect()->route('admin.packages.index');
            }else{

                DB::table('package_user')->where('package_id', $id)->delete();
                $this->_packageModel->delete($id);
                $this->_packageTranslationModel->delete($id);

                notify()->success('Package deleted successfully!');
                return redirect()->route('admin.packages.index');
            }
            
        }


        // if(!env('USER_VERIFIED'))
        // {
        //     notify()->error('This feature is disable for demo!');
        //     return redirect()->route('admin.packages.index');
        // }else{
        //     $this->_packageModel->delete($id);
        //     $this->_packageTranslationModel->delete($id);
        //     notify()->success('Package deleted successfully!');
        //     return redirect()->route('admin.packages.index');
        // }
    }

    public function updateFeature(Request $request)
    {
        $package = Package::find($request->id);
        $package->is_featured = $request->status;
        $package->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function updateStatus(Request $request)
    {
        $package = Package::find($request->id);
        $package->status = $request->status;
        $package->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    
    public function pkgUser($id){
        $enrolls = PackageUser::with(['user','package'])
        ->where('package_id',$id)->get();
        $package = Package::where('id',$id)->get()->first();
        if($package == null){
            return redirect()->route('admin.packages.index');
        }


        return view('admin.pkgusers.index', compact('enrolls','package'));        
    }
}
