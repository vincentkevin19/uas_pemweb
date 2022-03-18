<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\facility;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'management'){
            return view('management.request',[
                'bookings' => booking::all()
            ]);
        }
        if(auth()->user()->role == 'user'){
            return view('user.request',[
                'bookings' => booking::all()
            ]);
        }
        if(auth()->user()->role == 'admin'){
            return view('admin.request',[
                'bookings' => booking::all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'user'){
            return view('user.requestCreate',[
                'bookings' => booking::find(),
                'facilities' => facility::all(),
            ]);
        }else{
            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'facility_id' => 'required',
            'date' => 'required|unique:bookings',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
    
    
        booking::create($validatedData);
    
        return redirect('/booking')->with('success', 'new facility has been booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        if(auth()->user()->role == 'admin'){
            booking::destroy($booking->id);
    
            return redirect('/booking')->with('success', ' booking has been deleted');
        }else if(auth()->user()->role == 'management') {
            booking::destroy($booking->id);
    
            return redirect('/booking')->with('success', ' booking has been deleted');
        }else{
            abort(403);
        }
    }
}
