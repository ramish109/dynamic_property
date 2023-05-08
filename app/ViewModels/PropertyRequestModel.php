<?php
namespace App\ViewModels;

use App\Models\PropertyRequest;
use App\Models\User;

use App\Services\PropertyRequestService;
use App\Traits\ImageUpload; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash; 

class PropertyRequestModel implements IPropertyRequestModel
{
    use ImageUpload;
    private $_userService;
    public function __construct(UserService $service)
    {
        $this->_userService = $service;
    }

    public function getAll(Request $request)
    { 
        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');
        $data = PropertyRequest::get();
    
        // $data = $this->_userService->getAgents();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('email', function ($row) use ($locale)
            {
                return $row->email;
            });

    }

    public function getById($id)
    {
        return $this->_userService->getById($id); 
    }

    public function add(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['same:password'],
        ]);
        $data = $request->all();
        $data['email_verified_token'] = '123123';
        $data['is_email_verified'] = '1';
        // dd($data);
        $data['password'] = Hash::make($data['password']);
        $locale = Session::get('currentLocal');
        $data['locale'] = $locale;
        $this->_userService->add($data);
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'f_name'=> 'required',
            'l_name'=> 'required',
            'username'=> 'required',
            'type'=> 'nullable',
            'email'=> 'required',
            'mobile'=> 'nullable',
            'mobile_office' => 'nullable',
            'title'=> 'nullable',
            'company_name'=> 'nullable',
            'image'=> 'nullable',
            'description'=> 'nullable',
            'skype'=> 'nullable',
            'fb'=> 'nullable',
            'twitter'=> 'nullable',
            'instagram'=> 'nullable',
        ]);
        //thumbnail image save start
        $image = $request->file('image');
        $slug = $request->input('username');
        $user  = $this->getById($id);
        $imageName = $this->imageUpdate($image,$slug,$user,'users',380,400);
        //thumbnail image save end
        $data = $request->all();
        
        $data['image'] =$imageName;
        $this->_userService->update($data,$id);
    }

    public function delete($id)
    {
        $this->_userService->delete($id);
    }

}