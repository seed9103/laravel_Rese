<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Reservation;


class RestaurantController extends Controller
{



    
    public function index()
    {
        $restaurants = Restaurant::all();
        $areas = Restaurant::distinct()->pluck('location'); 
        $genres = Restaurant::distinct()->pluck('genre'); 
        return view('index', compact('restaurants', 'areas', 'genres'));
    }

    public function detail($id)
    {
        $restaurants = Restaurant::find($id);
        $reservation = Reservation::where('restaurant_id', $id)->first();
    
        return view('detail', compact('restaurants', 'reservation'));
       
    }

    public function menu()
    {
        return view('menu');
    }

    public function search(Request $request)
    {
        $query = Restaurant::query();
    
        if ($request->filled('area')) {
            $query->where('location', $request->area);
        }
    
        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }
    
        if ($request->filled('keyword')) {
            $query->where('name', 'LIKE', "%{$request->keyword}%")
                  ->orWhere('description', 'LIKE', "%{$request->keyword}%")
                  ->orWhere('location', 'LIKE', "%{$request->keyword}%")
                  ->orWhere('genre', 'LIKE', "%{$request->keyword}%");
        }
    
        $restaurants = $query->get();
    
        
        $areas = Restaurant::distinct()->pluck('location');
        $genres = Restaurant::distinct()->pluck('genre');
    
        return view('index', compact('restaurants', 'areas', 'genres'));
    }
}
