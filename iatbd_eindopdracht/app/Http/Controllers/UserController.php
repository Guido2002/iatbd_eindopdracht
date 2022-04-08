<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id) {
        return view('user.show', [
            'users' => \App\Models\User::find($id),
        ]);
    }

    public function account() {
        return redirect("/mijnprofiel");
    }

    public function showBlock() {
        return view('block', [
            'users' => \App\Models\User::all(),
        ]);
    }

    public function block(Request $request) {
            $input =$request->get('user');
            $user = \App\Models\User::find($input);
            $user->blocked = 1;
            $user->save();

            return redirect('/logout');
    }
}
