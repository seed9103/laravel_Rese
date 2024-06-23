<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{



    public function store(ReservationRequest $request)
    {
     

        $reservationData=$request->only([    
        'user_id',    
        'restaurant_id',
        'reservation_date', 
        'reservation_time', 
        'num_people',
    ]);
       
    Reservation::create($reservationData);
       
    return redirect('reservation_thanks');
}

public function reservation_thanks()
{
    return view('reservation_thanks');
}
    
public function destroy($id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->delete();

    return redirect()->back();
}


    public function edit($id)
    {
        
        $reservation = Reservation::findOrFail($id);
        return view('edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
       
        $reservation = Reservation::findOrFail($id);
        $reservation->reservation_date = $request->reservation_date;
        $reservation->reservation_time = $request->reservation_time;
        $reservation->num_people = $request->num_people;
        $reservation->save();

        
        return redirect('my_page');
    }
}
