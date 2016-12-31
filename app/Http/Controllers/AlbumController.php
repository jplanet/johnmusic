<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Album;
use \App\Band;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $albums = Album::all();
        return view('album/list', array('albums' => $albums));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $bands = Band::all();
        return view('album/edit', array('bands' => $bands));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $album = new Album;
        $album->name = $request->input('name');
        $album->recorded_date = date('Y-m-d', strtotime($request->input('recorded_date')));
        $album->release_date = date('Y-m-d', strtotime($request->input('release_date')));
        $album->number_of_tracks = (int) $request->input('number_of_tracks');
        $album->label = $request->input('label');
        $album->producer = $request->input('producer');
        $album->genre = $request->input('genre');
        $album->band_id = (int) $request->input('band_id');
        if ($album->save()) {
            return Redirect::route('albums.index')->with('status', 'Album successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $album = Album::find($id);
        $bands = Band::all();
        return view('album/edit', array('album' => $album, 'bands' => $bands));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $album = Album::find($id);
        $album->name = $request->input('name');
        $album->recorded_date = date('Y-m-d', strtotime($request->input('recorded_date')));
        $album->release_date = date('Y-m-d', strtotime($request->input('release_date')));
        $album->number_of_tracks = (int) $request->input('number_of_tracks');
        $album->label = $request->input('label');
        $album->producer = $request->input('producer');
        $album->genre = $request->input('genre');
        $album->band_id = (int) $request->input('band_id');
        if ($album->save()) {
            return Redirect::route('albums.index')->with('status', 'Album successfully edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Album::destroy($id);
    }

}
