<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function edit($id)
    {
        $profile = User::findOrFail($id);

        return view('pages.profile.edit_profile', ['profile' => $profile]);
    }
}
