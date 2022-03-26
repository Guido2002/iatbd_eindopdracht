<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return view('item.index', [
            'item' => \App\Models\Item::all(),
        ]);
    }

    public function show($id) {
        return view('item.show', [
            'item' => \App\Models\Item::find($id),
        ]);
    }
}
