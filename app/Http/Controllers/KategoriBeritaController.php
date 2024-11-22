<?php

namespace App\Http\Controllers;

use App\Models\kategori_berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $type_menu = 'kategori_berita';
        $kategori_berita = kategori_berita::all();

        return view('pages.kategori_berita.index', compact('type_menu', 'kategori_berita'));
    }

    public function create()
    {
        $type_menu = 'kategori_berita';

        return view('pages.kategori_berita.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        kategori_berita::create([
            'nama' => $request->nama,
        ]);
        return Redirect::route('kategori_berita.index')->with('success', 'Kategori Berita berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(kategori_berita $kategori_berita)
    {
        $type_menu = 'kategori_berita';

        return view('pages.kategori_berita.edit', compact('type_menu', 'kategori_berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori_berita $kategori_berita)
    {
        $request->validate([
            'nama' => 'required|string',
        ]);

        $kategori_berita->update([
            'nama' => $request->nama,
        ]);

        return Redirect::route('kategori_berita.index')->with('success', 'Kategori Berita berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori_berita $kategori_berita)
    {
        $kategori_berita->delete();
        return Redirect::route('kategori_berita.index')->with('danger', 'Kategori Berita berhasil di hapus.');
    }
}
