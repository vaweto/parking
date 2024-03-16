<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\ParkingZone;
use App\Models\Ticket;

/**
 * @group Tickets
 */
class TicketController extends Controller
{
    /**
     * @authenticated
     */
    public function index()
    {
        $activeTickets = auth()->user()->tickets()->active()->get();
        return TicketResource::collection($activeTickets);
    }

    public function show(Ticket $ticket)
    {
        return TicketResource::make($ticket);
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = $request->user()->tickets()->create(
            array_merge(
                $request->validated(),
                ['cost_in_cents' => ParkingZone::find($request->get('parking_zone_id'))->pricing->cost_in_cents]
            )
        );
        $ticket->load(['zone','vehicle']);

        return TicketResource::make($ticket);
    }

    public function update(Ticket $ticket, UpdateTicketRequest $request)
    {
        $ticket->update($request->validated());

        return TicketResource::make($ticket);
    }

    public function stop(Ticket $ticket)
    {
        if($ticket->isActive()) {
            $ticket->update(['expires_at' => now()]);
        }

        return TicketResource::make($ticket);
    }
}
