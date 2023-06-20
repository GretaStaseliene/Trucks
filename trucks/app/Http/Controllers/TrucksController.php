<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use App\Models\truck_subunits;
use App\Http\Requests\StoreTrucksRequest;
use App\Http\Requests\UpdateTrucksRequest;
use Illuminate\Support\Carbon;

class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trucks = Trucks::all();

        return view('home', [
            'trucks' => $trucks
        ]);
    }

    public function newTruck()
    {
        return view('newTruck');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrucksRequest $request)
    {
        $request->validate([
            'unit_number' => 'required',
            'year' => ['required',
                        'after_or_equal:1900',
                        'before_or_equal:' . Carbon::now()->addYears(5)->format('Y')
                    ],
            'notes' => 'sometimes'
        ]);

        $newTruck = new Trucks;

        $newTruck->unit_number = $request->unit_number;
        $newTruck->year = $request->year;
        $newTruck->notes = $request->notes;

        $newTruck->save();

        return redirect('/')->with('success', 'Truck added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, truck_subunits $truck_subunits)
    {
        // $truck = Trucks::with('subunit')->find($id);
        // return view('singleTruck', ['truck' => $truck,
        //                             'truck_subunits' => $truck_subunits
        //                             ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $truck = Trucks::find($id);
        return view('editTruck', ['truck' => $truck]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrucksRequest $request, $id)
    {
        $request->validate([
            'edit_unit_number' => 'required',
            'edit_year' => 'required',
            'edit_notes' => 'sometimes'
        ]);

        $truck = Trucks::find($id);

        $truck->unit_number = $request->unit_number;
        $truck->year = $request->year;
        $truck->notes = $request->notes;

        $truck->save();

        return redirect('/')->with('success', 'Truck information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $truck = Trucks::find($id);

        $truck->delete();

        return redirect('/')->with('success', 'Truck successfully deleted.');
    }
}
