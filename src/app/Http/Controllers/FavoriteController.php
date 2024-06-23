<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request)
    {
        $userId = auth()->user()->id;
        $restaurantId = $request->input('restaurant_id');
    
        $favorite = Favorite::where('user_id', $userId)
            ->where('restaurant_id', $restaurantId)
            ->first();
    
        if ($favorite) {
            
            $favorite->delete();
            
        } else {
            
            Favorite::create([
                'user_id' => $userId,
                'restaurant_id' => $restaurantId,
            ]);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
    $favorite = Favorite::findOrFail($id);
    $favorite->delete();

    return redirect()->back();
    }
}