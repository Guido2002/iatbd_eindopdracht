<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class RequestsController extends Controller
{
    public function storeRequest(\App\Models\Request $request, $userId, $itemId) {

        $item = \App\Models\Item::find($itemId);

        $request->user_id = $userId;
        $request->item_id = $itemId;
        $request->reader = $item->id_lender;
        $request->save();

        return Redirect::to('/mijnprofiel');
    }

    public function deleteRequest($requestid) {
            $item = \App\Models\Request::find($requestid);
            $item->delete();

            return redirect('/mijnprofiel');
    }
}

