<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketPurchaseRequest;
use App\Models\Tickets;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Ticket;

class TicketsController extends Controller
{
    public function buy(TicketPurchaseRequest $request): RedirectResponse
    {
        Tickets::create([
            "user_id" => auth()->user()->id,
            "numbers" => implode(" ", $request->get("numbers")),
            "price" => env("TICKET_PRICE_CREDITS")
        ]);
        return redirect()->back();
    }
}
