<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = array();
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            $events[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $booking->color, 
                'textColor' => 'white',

            ];
        }

        return view('user.home', ['events' => $events]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'color' => 'nullable|string',
        ]);

        $booking = Booking::create([
            "title" => $request->title,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "color" => $request->color, 
        ]);

        return response()->json([
            'id' => $booking->id,
            'title' => $booking->title,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'color' => $booking->color, 
        ]);
    }



    public function update (Request $request, $id)
    {
        $booking = Booking::find($id);
        if(!$booking) {
            return response ()->json ([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update ([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json ('Event updated');
    }




    public function destroy ($id)
    {
        $booking = Booking::find($id);
        if(!$booking) {
            return response()->json([
                'error' => 'Unable to locate event'
            ],404);
        }
        $booking->delete();
        return $id;
    }

}
