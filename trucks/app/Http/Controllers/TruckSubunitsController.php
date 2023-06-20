<?php

namespace App\Http\Controllers;

use App\Models\truck_subunits;
use App\Http\Requests\Storetruck_subunitsRequest;
use App\Http\Requests\Updatetruck_subunitsRequest;
use Illuminate\Support\Facades\Session;

class TruckSubunitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newSubunit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetruck_subunitsRequest $request)
    {
        $request->validate([
            'main_truck' => 'required|exists:trucks,id',
            'subunit' => 'required|exists:trucks,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if($request->main_truck === $request->subunit) {
            $errorMessage = 'Main truck cannot be subunit truck. Please choose another subunit';
            Session::flash('error', $errorMessage);
            return redirect('/newSubunit');
        }

        $subunit = new truck_subunits;

        $subunit->main_truck = $request->main_truck;
        $subunit->subunit = $request->subunit;
        $subunit->start_date = $request->start_date;
        $subunit->end_date = $request->end_date;

        $subunit->save();

        return redirect('/')->with('success', 'Subunit added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(truck_subunits $truck_subunits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(truck_subunits $truck_subunits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetruck_subunitsRequest $request, truck_subunits $truck_subunits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(truck_subunits $truck_subunits)
    {
        //
    }
}
