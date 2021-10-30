<?php

namespace App\Http\Controllers;
use App\Models\Album;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('albums.create');
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
        $this -> validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        Album::create([
            'name' => $request->name,
            'description' =>$request->description,
        ]);

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
        $images = $album->getMedia();
        /*foreach ($images as $image) {
            # code...
            dd($image->getPath());
        }*/
        
        return view('albums.show', compact('album', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
        $this -> validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $album->update([
            'name' => $request->name,
            'description' =>$request->description,
        ]);

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
        $album->delete();
        return redirect()->back();
    }

    public function upload(Request $request , Album $album)
    {
        # code...
        $this -> validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->has('image')) {
            # code...
            $album->addMedia($request->image)->toMediaCollection();
        }
        return redirect()->back();
    }
}
