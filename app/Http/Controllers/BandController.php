<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Band;
use \App\Album;
use Illuminate\Support\Facades\Redirect;

class BandController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $bands = Band::all();
        return view('band/list', array('bands' => $bands));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('band/edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $band = new Band;
        $band->name = $request->input('name');
        $band->start_date = date('Y-m-d',strtotime($request->input('start_date')));
        $band->website = $request->input('website');
        $band->still_active = (int)$request->input('still_active');
        if ($band->save()) {
            return Redirect::route('bands.index')->with('status', 'Band successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //view/edit page referred to as one entity in spec
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $band = Band::find($id);
        return view('band/edit', array('band' => $band));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $band = Band::find($id);
        $band->name = $request->input('name');
        $band->start_date = date('Y-m-d',strtotime($request->input('start_date')));
        $band->website = $request->input('website');
        $band->still_active = (int)$request->input('still_active');
        if ($band->save()) {
            return Redirect::route('bands.index')->with('status', 'Band successfully edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Band::destroy($id);
        Album::where('band_id',$id)->delete();
    }

}
