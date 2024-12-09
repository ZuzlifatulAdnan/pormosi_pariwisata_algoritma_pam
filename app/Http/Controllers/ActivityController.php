<?php

namespace App\Http\Controllers;

use App\Models\activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ActivityController extends Controller
{
    public function index()
    {
        $type_menu = 'review';
        $activitys = activity::all();

        return view('pages.activity.index', compact('type_menu', 'activitys'));
    }

    public function create()
    {
        $type_menu = 'review';

        return view('pages.activity.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        activity::create([
            'nama' => $request->nama
        ]);
        return Redirect::route('activity.index')->with('success', ' Activity berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(activity $activity)
    {
        $type_menu = 'review';

        return view('pages.activity.edit', compact('type_menu', 'activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, activity $activity)
    {
        $request->validate([
            'nama' => 'required|string'
        ]);

        $activity->update([
            'nama' => $request->nama
        ]);

        return Redirect::route('activity.index')->with('success', 'Activity berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(activity $activity)
    {
        $activity->delete();
        return Redirect::route('activity.index')->with('danger', 'Activity berhasil di hapus.');
    }
}
