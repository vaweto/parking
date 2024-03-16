<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'zone' => $this->whenLoaded('zone', ParkingZoneResource::make($this->zone)),
            'vehicle' => $this->whenLoaded('vehicle', VehicleResource::make($this->vehicle)),
            'start_at' => $this->start_at?->toDateTimeString(),
            'expires_at' => $this->expires_at?->toDateTimeString(),
            'cost_in_cents' => $this->cost_in_cents
        ];
    }
}
