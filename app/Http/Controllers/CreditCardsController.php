<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditCards\NewCardRequest;
use App\Models\CreditCards;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreditCardsController extends Controller
{
    public function save(NewCardRequest $request){

        $expiry = $request->get('expiry_month')."/".$request->get('expiry_year');

        $date = Carbon::createFromDate($request->get('expiry_year'),$request->get('expiry_month'),1);

        $creditCards = new CreditCards();

        $creditCards->card_number = $request->card_number;
        $creditCards->cvv = $request->cvv;
        $creditCards->expiry = $expiry;
        $creditCards->user_id = Auth::id();
        $creditCards->expiry = $date;
        $creditCards->save();

        return redirect()->back();
    }
    public function delete()
    {
        
    }
}
