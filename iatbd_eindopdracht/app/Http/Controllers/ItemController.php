<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return view('frontpage', [
            'items' => \App\Models\Item::all(),
        ]);
    }

    public function show($id) {
        return view('item_detail', [
            'item' => \App\Models\Item::find($id),
            'users' =>  \App\Models\User::all(),
        ]);
    }
}
