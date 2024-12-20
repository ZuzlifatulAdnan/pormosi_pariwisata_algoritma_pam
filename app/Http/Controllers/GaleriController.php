<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $type_menu = 'galeri';
        $galeris = galeri::all();
        return view('pages.galeri.index', compact('type_menu', 'galeris'));
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
            'type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image field
            'vidio' => 'nullable|string|max:255',

        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/galeri/', $imagePath);
        }

        galeri::create([
            'nama' => $request->nama,
            'type' => $request->type,
            'image' => $imagePath,
            'vidio' => $request->vidio,
        ]);
        return Redirect::route('galeris.index')->with('success', ' Galeri berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(galeri $galeri)
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
            'type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image field
            'vidio' => 'nullable|string|max:255',
        ]);

        $galeri->update([
            'nama' => $request->nama,
            'type' => $request->type,
            'vidio' => $request->vidio
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/galeri/', $path);
            $galeri->update([
                'image' => $path
            ]);
        }
        return Redirect::route('galeris.index')->with('success', 'Galeri berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(galeri $galeri)
    {
        $galeri->delete();
        return Redirect::route('galeris.index')->with('danger', 'Galeri berhasil di hapus.');
    }
    public function foto(Request $request)
    {
        $type_menu = 'galeri';
        $judul = $request->input('judul');
        // Mengambil Foto dengan pencarian dan pagination
        $foto = galeri::when($judul, function ($query, $judul) {
            return $query->where('nama', 'like', '%' . $judul . '%');
        })
            ->where('type', 'Foto')
            ->orderBy('created_at', 'desc')
            ->paginate(9); // Mengatur jumlah item per halaman
        return view('pages.galeri.foto', compact('type_menu', 'foto'));
    }
    public function vidio(Request $request)
    {
        $type_menu = 'galeri';
         // Mengambil query pencarian dari input
         $judul = $request->input('judul');

         // Mengambil Video dengan pencarian dan pagination
         $videos = galeri::when($judul, function ($query, $judul) {
            return $query->where('nama', 'like', '%' . $judul . '%');
        })
            ->where('type', 'Vidio')
            ->orderBy('created_at', 'desc')
            ->paginate(8);// Mengatur jumlah item per halaman

        return view('pages.galeri.vidio', compact('type_menu', 'videos'));
    }
}
