<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function edit()
    {
        $user_id = Auth::id();
        $profile = User::findOrFail($user_id);

        $profile = DB::table('users')
            ->join('user_contact', 'users.id', '=', 'user_contact.user_id')
            ->select('*')
            ->where('users.id', Auth::id())
            ->first();

        return view('pages.profile.edit_profile', ['profile' => $profile]);
    }
}
