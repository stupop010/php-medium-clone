<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('setting', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($request->bio) {
            $request->validate([
                'bio' => ['string', 'max:255']
            ]);
            $user->bio = $request->bio;
        };

        if ($request->password) {
            $request->validate([
                'password' => ['string', 'min:8']
            ]);
            $user->password = Hash::make($request->password);
        };

        $user->username = $request->username;
        $user->email = $request->email;

        $user->save();
        return view('setting', ['user' => $user]);
    }
}
