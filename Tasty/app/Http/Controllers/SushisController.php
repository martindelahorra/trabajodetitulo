<?php

namespace App\Http\Controllers;

use App\Sushi;
use Illuminate\Http\Request;

class SushisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sushis = Sushi::all();
        return view('sushis.index',compact('sushis'));
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
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function show(Sushi $sushi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sushi $sushi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sushi $sushi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sushi $sushi)
    {
        //
    }
}
