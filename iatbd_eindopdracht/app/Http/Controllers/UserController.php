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
}
