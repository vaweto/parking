<?php

namespace App\Observers;

use App\Models\Vehicle;

class VehicleObserver
{
    /**
     * Handle the Vehicle "created" event.
     */
    public function creating(Vehicle $vehicle): void
    {
        if(auth()->check()){
            $vehicle->user_id = auth()->id();
        }
    }

}
