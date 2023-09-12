<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountSaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function save(UserAccountSaveRequest $request){
        $user = Auth::user();
        $user->email = $request->email;
        $user->name = $request->name;

        if($request->has("password") && strlen($request->get('password'))>= 1)
        {
            $user->password = Hash::make($request->get('password'));
        }
        $user->save();
        return redirect()->back();
    }
}
