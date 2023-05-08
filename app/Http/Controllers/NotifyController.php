<?php

namespace App\Http\Controllers;

use App\Models\notify;
use App\Http\Requests\StorenotifyRequest;
use App\Http\Requests\UpdatenotifyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use auth;

class NotifyController extends Controller
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
     * @param  \App\Http\Requests\StorenotifyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenotifyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function show(notify $notify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(Auth::user()->type == "admin"){
            $now = Carbon::now()->toDateTimeString();
            DB::table('notifies')
                ->where('property_id', $id)
                ->update(['read_at' => $now]);
            return redirect()->route('admin.properties.edit',$id);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenotifyRequest  $request
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenotifyRequest $request, notify $notify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy(notify $notify)
    {
        //
    }
}
