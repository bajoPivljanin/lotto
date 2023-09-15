<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OwnsCreditCard implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $userCreditCards = auth()->user()->cards()->where(['id' => $value])->first();
        
        if($userCreditCards === null)
        {
            $fail("This is not your card");
        }
    }
}
