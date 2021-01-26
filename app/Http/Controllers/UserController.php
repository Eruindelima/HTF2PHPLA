<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user_id = Auth::id();
        $profile = User::findOrFail($user_id);

        return view('pages.profile.edit_profile', ['profile' => $profile]);
    }
}
