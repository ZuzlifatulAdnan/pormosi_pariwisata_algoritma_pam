<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\galeri;
use App\Models\review;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $type_menu = 'beranda';
        $users = User::all();
        $beritas = berita::all();
        $reviews = review::all();
        $fotos = galeri::where('type', 'Foto') ->get();
        $vidios= galeri::where('type', 'Vidio') ->get();
        return view('pages.beranda.index', compact(
            'type_menu',
            'users',
            'beritas',
            'reviews',
            'fotos',
            'vidios'
        ));
    }
}
