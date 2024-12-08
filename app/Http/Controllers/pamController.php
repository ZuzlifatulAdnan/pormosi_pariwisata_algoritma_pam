<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class pamController extends Controller
{
    public function index()
    {
        $type_menu = 'review';
        $reviews = review::all();

        return view('pages.pam.index', compact('type_menu', 'reviews'));
    }
}
