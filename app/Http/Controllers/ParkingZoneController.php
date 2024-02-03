<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParkingZoneRequest;
use App\Http\Requests\UpdateParkingZoneRequest;
use App\Models\ParkingZone;

class ParkingZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParkingZoneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParkingZone $parkingZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingZoneRequest $request, ParkingZone $parkingZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParkingZone $parkingZone)
    {
        //
    }
}
