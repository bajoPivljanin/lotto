<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketPurchaseRequest;
use App\Models\Tickets;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function buy(TicketPurchaseRequest $request): RedirectResponse
    {
        Tickets::create([
            "user_id" => auth()->user()->id,
            "numbers" => implode(",", $request->get("numbers")),
            "price" => env("TICKET_PRICE_CREDITS")
        ]);

        $user = Auth::user();
        $user->credits -= env('TICKET_PRICE_CREDITS');
        $user->save();
        return redirect()->back()->with([
            'message' => 'You have successfully bought a lotto ticket. Your credit status is: '.$user->credits
        ]);
    }
}
