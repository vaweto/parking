<?php

namespace App\Observers;

use App\Models\Ticket;

class TicketObserver
{
    /**
     * Handle the Vehicle "created" event.
     */
    public function creating(Ticket $ticket): void
    {
        if(auth()->check()){
            $ticket->user_id = auth()->id();
        }
        $ticket->start_at = now();
    }
}
