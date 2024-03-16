<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParkingZoneResource;
use App\Models\ParkingZone;
use Illuminate\Http\Request;

class ParkingZoneController extends Controller
{
    public function index()
    {
        return ParkingZoneResource::collection(ParkingZone::query()->paginate());
    }
}
