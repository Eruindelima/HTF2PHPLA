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

        $profile = DB::table('users')
            ->leftJoin('user_contact', 'users.id', '=', 'user_contact.user_id')
            ->select('*')
            ->where('users.id', $user_id)
            ->first();

        return view('pages.profile.edit_profile', ['profile' => $profile]);
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();

        $profile = User::find($user_id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        if (isset($request->password)) {
            $profile->password = $request->password;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalname().strtotime("now")).".".$extension;
            $request->image->move(public_path('/assets/img/profile'), $imageName);
            $profile->image = $imageName;
        }

        $profile->save();

        $profile_contact = UserContact::firstOrCreate([
            'user_id' => $user_id,
            'cpf' => $request->cpf,
            'address' => $request->address,
            'neighborhood' => $request->neighborhood,
            'cep' => $request->cep,
            'city' => $request->city,
            'state' => $request->state,
            'phone' => $request->phone
        ]);

        $request->session()->flash('mensagem', "{$profile->name} cadastro foi atualizado com sucesso.");

        if ($profile_contact->save()) {
            return redirect()->route('product.index');
        }
    }
}
