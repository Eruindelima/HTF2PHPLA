<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserContact;
use Illuminate\Http\Request;
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

    public function update(Request $request, $user_id)
    {
        $profile = User::find($user_id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->save();

        $profile_contact = UserContact::firstWhere('user_ida', $user_id);
        $profile_contact->cpf = $request->cpf;
        $profile_contact->adress = $request->adress;
        $profile_contact->neighborhood = $request->neighborhood;
        $profile_contact->cep = $request->cep;
        $profile_contact->city = $request->city;
        $profile_contact->state = $request->state;
        $profile_contact->phone = $request->phone;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalname().strtotime("now")).".".$extension;
            $request->image->move(public_path('/assets/img/profile'), $profile);
            $profile->product = $imageName;
        }
        if ($profile->save()) {
            return redirect()->route('product.index');
        }
    }
}
