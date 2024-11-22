<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\review;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $type_menu = 'dashboard';
        $users = User::all();
        $berita = berita::all();
        $review = review::all();
        return view('pages.beranda.index', compact(
            'type_menu',
            'users',
            'berita',
            'review'
        ));
    }
}
