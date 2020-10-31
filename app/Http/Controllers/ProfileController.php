<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        return view('setting', ['user' => auth()->user()]);
    }

    public function show($user)
    {
        $user = User::where('username', $user)->get();
        $user = $user[0];

        $articles = Article::where('user_id', $user->id)->withCount('follow')->get();

        return view('profile', compact('user', 'articles'));
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
