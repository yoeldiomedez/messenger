<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->name;

        if($request->password <> null){
            $user->password = bcrypt($request->password);
        }

        $file = $request->picture;

        if($file <> null) {
            $path = public_path('/users');
            $name = time() . "." . $file->getClientOriginalExtension();
            $move = $file->move($path, $name);
            $user->picture = $name;
        }

        $user->save();

        return back();
    }
}
