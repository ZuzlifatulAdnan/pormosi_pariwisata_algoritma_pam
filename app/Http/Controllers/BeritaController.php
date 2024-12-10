<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\kategori_berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $type_menu = 'berita';

        // Mengambil input untuk pencarian dan filter
        $keyword = $request->input('judul'); // Kata kunci pencarian berdasarkan judul
        $kategoriId = $request->input('kategori_berita_id'); // Filter berdasarkan kategori

        // Query berita berdasarkan pencarian dan filter
        $beritas = Berita::query()
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategori_berita_id', $kategoriId);
            })
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('judul', 'like', '%' . $keyword . '%')
                        ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
                });
            })
            ->latest()
            ->paginate(9); // Sesuaikan jumlah item per halaman

        // Menambahkan parameter pencarian ke pagination
        $beritas->appends([
            'judul' => $keyword,
            'kategori_berita_id' => $kategoriId,
        ]);

        // Mengambil semua kategori berita
        $kategori_berita = kategori_berita::all();
        
        return view('pages.berita.index', compact('type_menu', 'beritas', 'kategori_berita'));
    }

    public function create()
    {
        $type_menu = 'berita';
        $kategoriBerita = kategori_berita::all();
        return view('pages.berita.create', compact('type_menu', 'kategoriBerita'));
    }
    public function show($id)
    {
        $type_menu = 'berita';
        // Main
        $berita = Berita::find($id);

        // Check if the news article exists
        if (!$berita) {
            return abort(404, 'Berita tidak ditemukan.');
        }
        return view('pages.berita.show', [
            // Main
            'berita' => $berita,
            'type_menu' => $type_menu,

        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_berita_id' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|mimes:jpg,png,jpeg'
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/berita/', $imagePath);
        }
        berita::create([
            'kategori_berita_id' => $request->kategori_berita_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
        ]);

        return Redirect::route('beritas.index')->with('success', 'Berita berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(berita $berita)
    {
        $type_menu = 'berita';
        $kategoriBerita = kategori_berita::all();

        return view('pages.berita.edit', compact('type_menu', 'berita', 'kategoriBerita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, berita $berita)
    {
        $request->validate([
            'kategori_berita_id' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image field
        ]);

        $berita->update([
            'kategori_berita_id' => $request->kategori_berita_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/berita/', $path);
            $berita->update([
                'image' => $path
            ]);
        }

        return Redirect::route('beritas.index')->with('success', 'Berita berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(berita $berita)
    {
        $berita->delete();
        return Redirect::route('beritas.index')->with('danger', 'Berita berhasil di hapus.');
    }
}
