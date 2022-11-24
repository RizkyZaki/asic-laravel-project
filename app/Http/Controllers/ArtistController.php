<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.artists.index', [
            'title' => "ASIC ADMIN | List Artist",
            'artists' => Artist::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artists.create', [
            'title' => "ASIC ADMIN | Add Artist",
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
            'name' => "required|unique:artists",
            'about' => 'required',
            'image' => 'required|image|file'
        ]);
        $validatedData['slug'] = Str::slug($request->input('name'), '-');
        $validatedData['image'] = $request->file('image')->store('image');
        Artist::create($validatedData);

        return redirect('artist')->with('success', 'data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('admin.artists.update', [
            'title' => 'ASIC ADMIN | Edit',
            'artist' => $artist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $rules = [
            // 'judul' => 'required|unique:materi',
            // 'slug' => 'required',
            'about' => 'required',
            'image' => 'image|file',
        ];

        if ($request->name != $artist->name) {
            $rules['name'] = 'required|unique:artists';
        }

        $validatedData = $request->validate($rules);

        $validatedData['slug'] = Str::slug($request->input('name'), '-');
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('image');
        }

        // ddd($validatedData);

        Artist::where('id', $artist->id)->update($validatedData);

        return redirect('artist')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        if ($artist->image) {
            Storage::delete($artist->image);
        }
        Artist::destroy($artist->id);
        return redirect('artist')->with('success', 'data berhasil dihapus');
    }
}
