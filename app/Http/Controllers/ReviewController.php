<?php

namespace App\Http\Controllers;

use App\Models\activity;
use App\Services\PamClusteringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Phpml\Clustering\KMeans;
use Phpml\Clustering\KMedoids;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $type_menu = 'review';
        $reviews = Review::orderBy('cluster')->get();
        return view('pages.review.index', compact('type_menu', 'reviews'));
    }

    public function create()
    {
        $type_menu = 'review';
        $activities = activity::all();

        return view('pages.review.create', compact('type_menu', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jumlah_pengunjung' => 'required|string',
            'asal_pengunjung' => 'required|string',
            'activity_id' => 'required',
            // 'nilai_review' => 'required|string',
            'review_pengunjung' => 'required|string',
        ]);

        review::create([
            'nama' => $request->nama,
            'jumlah_pengunjung' => $request->jumlah_pengunjung,
            'asal_pengunjung' => $request->asal_pengunjung,
            'activity_id' => $request->activity_id,
            // 'nilai_review' => $request->nilai_review,
            'review_pengunjung' => $request->review_pengunjung,
        ]);
        return Redirect::route('reviews.index')->with('success', ' Review berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(review $review)
    {
        $type_menu = 'review';
        $activities = activity::all();
        return view('pages.review.edit', compact('type_menu', 'review', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        $request->validate([
            'nama' => 'required|string',
            'jumlah_pengunjung' => 'required|string',
            'asal_pengunjung' => 'required|string',
            'activity_id' => 'required',
            // 'nilai_review' => 'required|string',
            'review_pengunjung' => 'required|string',
        ]);

        $review->update([
            'nama' => $request->nama,
            'jumlah_pengunjung' => $request->jumlah_pengunjung,
            'asal_pengunjung' => $request->asal_pengunjung,
            'activity_id' => $request->activity_id,
            // 'nilai_review' => $request->nilai_review,
            'review_pengunjung' => $request->review_pengunjung,
        ]);

        return Redirect::route('reviews.index')->with('success', 'Review berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {
        $review->delete();
        return Redirect::route('reviews.index')->with('danger', 'Review berhasil di hapus.');
    }
    public function input()
    {
        $type_menu = 'review';
        $activities = activity::all();

        return view('pages.review.input', compact('type_menu', 'activities'));
    }
    public function stores(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jumlah_pengunjung' => 'required|string',
            'asal_pengunjung' => 'required|string',
            'activity_id' => 'required|integer',
            // 'nilai_review' => 'required|string',
            'review_pengunjung' => 'required|string',
        ]);

        review::create([
            'nama' => $request->nama,
            'jumlah_pengunjung' => $request->jumlah_pengunjung,
            'asal_pengunjung' => $request->asal_pengunjung,
            'activity_id' => $request->activity_id,
            // 'nilai_review' => $request->nilai_review,
            'review_pengunjung' => $request->review_pengunjung,
        ]);
        return Redirect::route('review.input')->with('success', ' Review berhasil di tambah.');
    }
}
