<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index() {

        $login_user = Auth::id();

        return view('frontpage', [
            'items' => \App\Models\Item::all(),
            'login_user' => $login_user,
        ]);
    }

    public function show($id) {

        $user = Auth::id();

        return view('item_detail', [
            'item' => \App\Models\Item::find($id),
            'users' =>  \App\Models\User::all(),
            'login_user' => $user,
        ]);
    }

    public function mijnprofiel() {

        $login_user = Auth::id();
        $users = \App\Models\User::all();
        $review = \App\Models\Review::all();

        return view('mijnprofiel', [
            'items' => \App\Models\Item::all(),
            'login_user' => $login_user,
            'reviews' => $review,
            'users' => $users,
        ]);
    }

    public function create() {
        return view('create', [
            'kind_of_item' => \App\Models\KindOfItem::all(),
            'items' => \App\Models\Item::all(),
        ]);
    }

    public function store(Request $request, \App\Models\Item $item) {
        $item->item_name = $request->input("name");
        $item->kind = $request->input('kind');
        $item->description = $request->input('description');
        $item->image = $request->input('image');
        $item->time_loaned = $request->input('leentijd');
        $item->id_lender = auth()->id();

        $item->save();

        return redirect('/items');
    }

    public function lenen( $id) {
        $item = \App\Models\Item::find($id);
        $item->loaned = 1;
        $item->id_borrower = auth()->id();
        $item->save();

        return redirect("/mijnprofiel");
    }

    public function deleteProduct() {
        return view('delete', [
            'items' => \App\Models\Item::all(),
        ]);
    }

    public function delete(Request $request) {
        $input = $request->get('item');
            $item = \App\Models\Item::find($input);
            $item->delete();

            return redirect('/mijnprofiel');
    }

    public function home() {
        return redirect('login');
    }
}
