<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $type_menu = 'profile';

            // Mengambil data user yang sedang login
            $user = Auth::user();
       
        return view('pages.profile.index', compact('type_menu', 'user'));
    }

    public function edit()
    {
        $type_menu = 'profile';
        return view('pages.profile.edit', compact('type_menu'));
    }

    public function update(Request $request, User $user)
    {
        $image = $request->file('file');

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($image) {

            $path = time() . '.' . $image->getClientOriginalExtension();
            $image->move('img/user/', $path);

            if ($user->foto) {
                $oldImagePath = 'img/user/' . $user->foto;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $user->update([
                'image' => $path
            ]);
        }

        return redirect()->route('profile')->with('success', 'Data Akun berhasil diperbarui.');
    }
}
