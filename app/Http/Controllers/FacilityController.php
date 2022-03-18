<?php

namespace App\Http\Controllers;

use App\Models\facility;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'user'){
            return view('user.facility',[
                'facilities' => facility::all()
            ]);
        }


        return view('admin.facility',[
            'facilities' => facility::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'user'){
            abort(403);
        }


        return view('admin.facilityCreate',[
            'facilities' => facility::all()
        ]);
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
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('facility-images');
        }


        facility::create($validatedData);

        return redirect('/facility')->with('success', 'new facility has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(facility $facility)
    {
        if(auth()->user()->role == 'user'){
            return view('user.facilityShow',[
                'facility' => $facility
            ]);
        }
        return view('admin.facilityShow',[
            'facility' => $facility
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(facility $facility)
    {
        if(auth()->user()->role == 'user'){
            abort(403);
        }
        return view('admin.facilityEdit',[
            'facility' => $facility
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, facility $facility)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);


        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('facility-images');
        }
        


        facility::where('id',$facility->id)->update($validatedData);

        return redirect('/facility')->with('success', ' facility has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(facility $facility)
    {
        if(auth()->user()->role == 'user'){
            abort(403);
        }

        if($facility->image){
            Storage::delete($facility->image);
        }
        facility::destroy($facility->id);

        return redirect('/facility')->with('success', 'Facility has been deleted');
    }
}
