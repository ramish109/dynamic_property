<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
 

class areas extends Model
{
    use HasFactory;
    protected $fillable = ['name','city_id','state_id','country_id','order','status','slug','image'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getAll(){

        App::setLocale(Session::get('currentLocal'));
        $locale = Session::get('currentLocal');

        // $data = areas::get();
        // return $data;

        $data = areas::with([ 'city.cityTranslation','cityTranslationEnglish','state.stateTranslation','state.stateTranslationEnglish','country.countryTranslation'])
        ->orderBy('id','DESC')
        ->get();
        // return $data;

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('country', function ($row) use ($locale){
                return $row->country->countryTranslation->name ?? $row->country->countryTranslationEnglish->name ?? null;

            })
            ->addColumn('state', function ($row) use ($locale){
                return $row->state->stateTranslation->name ?? $row->state->stateTranslationEnglish->name ?? null;

            })
            ->addColumn('city', function ($row) use ($locale)
            {
                return $row->cityTranslation->name ?? $row->cityTranslationEnglish->name ?? null;
            })

              ->addColumn('name', function ($row) use ($locale){
                return $row->name?? null;

            })

            ->addColumn('status',function($row){
                if($row->status == 1)
                {
                    $but =  '<span class="bg-primary p-1 text-white">Active</span>';
                    return $but;
                }else{
                    $but = '<span class="bg-warning p-1 text-white">Inactive</span>';
                    return $but;
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="d-flex justify-content-end">
                    <a href="'.route('admin.areas.edit',$row->id).'" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> 

                 | <form action="'.route('admin.areas.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
               <button class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="la la-trash"></i></button>
                </form></div>';
                return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);

    }

    public function properties()
    {
       return $this->hasMany(Property::class,'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function cityTranslation()
    {
        $locale = Session::get('currentLocal');
        return $this->hasOne(CityTranslation::class,'city_id')
            ->where('locale',$locale);
    }

    public function cityTranslationEnglish()
    {
        return $this->hasOne(CityTranslation::class,'city_id')
            ->where('locale','en');
    }

}
