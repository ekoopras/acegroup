<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if ($request->type === 'name') {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $user->name = $request->name;
        }

        if ($request->type === 'email') {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
            $user->email = $request->email;
        }

        if ($request->type === 'password') {
            $request->validate([
                'password' => 'required|confirmed|min:8',
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Data berhasil diperbarui');
    }
}
