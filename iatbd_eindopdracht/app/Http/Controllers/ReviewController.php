<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function review($userId, $itemId)
    {
        return view('review', [
            'userId' => $userId,
            'itemId' => $itemId,
        ]);
    }

    public function storeReview(Request $request, \App\Models\Review $review, $userId, $itemId) {
        $review->review = $request->input('review');
        $review->cijfer = $request->input('cijfer');

        $review->writer = Auth::id();
        $review->reader = $userId;
        $review->save();

        $item = \App\Models\Item::find($itemId);
        $item->loaned = FALSE;
        $item->id_borrower = null;
        $item->save();

        return Redirect::to('/mijnprofiel');
    }
}

