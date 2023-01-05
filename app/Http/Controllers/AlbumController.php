<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Str;
use App\Models\Artist;
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
        return view('admin.albums.index', [
            'title' => "ASIC ADMIN | List Album",
            'albums' => Album::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albums.create', [
            'title' => "ASIC ADMIN | List Album",
            'artist' => Artist::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => "required",
            'id_artist' => "required",
            'release_date' => 'required',
            'description' => 'required',
            'total_track' => 'required',
            'cover' => 'required|image|file'
        ]);
        $validatedData['slug'] = Str::slug($request->input('title'), '-');
        $validatedData['cover'] = $request->file('cover')->store('image');
        Album::create($validatedData);

        return redirect('album')->with('success', 'data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
