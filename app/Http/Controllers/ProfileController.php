<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg'
        ]);

        $user = User::find(Auth::user()->id);
        $avatar = $user->avatar;
        if($request->hasFile('avatar')){
        $avatar = $request->file('avatar')->store('public/avatar');
        }
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'avatar' => $avatar,
        ]);

        return back()->with('success','Profile was updated successfully.');
    }
}
