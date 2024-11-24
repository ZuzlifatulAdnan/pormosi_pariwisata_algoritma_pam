<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BeritaController extends Controller
{
    public function index()
    {
        $type_menu = 'berita';
        $berita = berita::latest()->get();

        return view('pages.berita.index', compact('type_menu', 'berita'));
    }

    public function create()
    {
        $type_menu = 'berita';

        return view('pages.berita.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/berita/', $path);
            berita::create([
                'image' => $path
            ]);
        }
        return Redirect::route('berita.index')->with('success', 'Berita berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(berita $berita)
    {
        $type_menu = 'berita';

        return view('pages.berita.edit', compact('type_menu', 'berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, berita $berita)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $berita->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/avatar/', $path);
            $berita->update([
                'image' => $path
            ]);
        }

        return Redirect::route('berita.index')->with('success', 'Berita berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(berita $berita)
    {
        $berita->delete();
        return Redirect::route('berita.index')->with('danger', 'Berita berhasil di hapus.');
    }
}
