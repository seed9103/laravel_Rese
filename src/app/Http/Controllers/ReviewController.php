<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {


        Review::create([
            'user_id' => auth()->id(),
            'restaurant_id' => $request->restaurant_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }
}
