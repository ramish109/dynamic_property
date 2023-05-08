<?php

namespace App\Http\Controllers;

use App\Models\DemandTrend;
use Illuminate\Http\Request;

class DemandTrendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        dd("Sucess Trends");
        return view('frontend.property-demand-trends');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
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
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function show(DemandTrend $demandTrend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandTrend $demandTrend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandTrend $demandTrend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemandTrend  $demandTrend
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandTrend $demandTrend)
    {
        //
    }
}
