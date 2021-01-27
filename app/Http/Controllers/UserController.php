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
        if (isset($profile->password)) {
            $profile->password = $request->password;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalname().strtotime("now")).".".$extension;
            $request->image->move(public_path('/assets/img/profile'), $profile);
            $profile->image = $imageName;
        }

        $profile->save();

        $profile_contact = UserContact::firstWhere('user_id', $user_id);
        $profile_contact->cpf = $request->cpf;
        $profile_contact->address = $request->address;
        $profile_contact->neighborhood = $request->neighborhood;
        $profile_contact->cep = $request->cep;
        $profile_contact->city = $request->city;
        $profile_contact->state = $request->state;
        $profile_contact->phone = $request->phone;

        $request->session()->flash('mensagem', "{$profile->name} cadastro foi atualizado com sucesso.");

        if ($profile_contact->save()) {
            return redirect()->route('product.index');
        }
    }
}
