<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class SufficientCredits implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(Auth::user()->credits < env('TICKET_PRICE_CREDITS')){
            $missingCredits = env("TICKET_PRICE_CREDITS")-Auth::user()->credits;
            $fail("You don't have enough credits. Missing: ".$missingCredits);

        }
    }
}
