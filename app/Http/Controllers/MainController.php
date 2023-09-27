<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function userForm()
    {
        $userInfos = new UserInfo();
        return view('userForm', ['userInfos' => $userInfos->all()]);
    }
    public function userForm_chek(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|min:4|max:10',
            'name' => 'required|min:2|max:10',
            'message' => 'required|min:2|max:10'
        ]);

        $userInfo = new UserInfo();
        $userInfo->email = $request->input('email');
        $userInfo->name = $request->input('name');
        $userInfo->message = $request->input('message');

        $userInfo->save();

        return redirect()->route('userForm');
    }
}
