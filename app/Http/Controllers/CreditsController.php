<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCreditsRequest;
use App\Models\Transactions;
use Illuminate\Contract\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;

class CreditsController extends Controller
{
    public function add(AddCreditsRequest $request): RedirectResponse
    {
        $user = \auth()->user();
        $currentCredits = $user->credits ?? 0;
        $user->credits = $currentCredits + $request->get("credits");
        $user->save();

        Transactions::create([
            'card_id'=> $request->get("credit_card"),
            'amount'=> $request->get("credits"),
            'price'=> env('CREDITS_VALUE_RSD'),
            'total_price'=> $request->credits*env('CREDITS_VALUE_RSD'),
            'status'=> Transactions::STATUS_ACTIVE,
        ]);
        return redirect()->back();
    }
}
