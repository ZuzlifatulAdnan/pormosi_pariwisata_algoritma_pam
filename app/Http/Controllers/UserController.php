<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $type_menu = 'user';
        $user = user::all();

        return view('pages.user.index', compact('type_menu', 'user'));
    }

    public function create()
    {
        $type_menu = 'user';

        return view('pages.user.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image' => 'nullable|mimes:jpg,png,jpeg',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make ($request->password),
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/user/', $path);
            User::create([
                'image' => $path
            ]);
        }
        return Redirect::route('user.index')->with('success', ' User berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(User $user)
    {
        $type_menu = 'user';

        return view('pages.user.edit', compact('type_menu', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        $user->update([
            'name' => $request->name,
        ]);
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'min:8'
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('img/user/', $path);
            $user->update([
                'image' => $path
            ]);
        }
        return Redirect::route('user.index')->with('success', 'User berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('user.index')->with('danger', 'User berhasil di hapus.');
    }
}
