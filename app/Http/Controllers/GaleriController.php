<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GaleriController extends Controller
{
    public function index()
    {
        $type_menu = 'galeri';
        $galeri = galeri::all();

        return view('pages.galeri.index', compact('type_menu', 'galeri'));
    }

    public function create()
    {
        $type_menu = 'galeri';

        return view('pages.galeri.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'file' => 'required',
            'type' => 'required|string',

        ]);

        galeri::create([
            'nama' => $request->nama,
            'file' => $request->file,
            'type' => $request->type,
        ]);
        return Redirect::route('galeri.index')->with('success', ' Galeri berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(galeri $review)
    {
        $type_menu = 'galeri';

        return view('pages.galeri.edit', compact('type_menu', 'galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, galeri $galeri)
    {
        $request->validate([
            'nama' => 'required|string',
            'file' => 'required',
            'type' => 'required|string',
        ]);

        $galeri->update([
            'nama' => $request->nama,
            'file' => $request->file,
            'type' => $request->type,
        ]);

        return Redirect::route('galeri.index')->with('success', 'Galeri berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(galeri $galeri)
    {
        $galeri->delete();
        return Redirect::route('galeri.index')->with('danger', 'Galeri berhasil di hapus.');
    }
}
