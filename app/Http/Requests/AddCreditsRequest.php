<?php

namespace App\Http\Requests;

use App\Rules\OwnsCreditCard;
use Illuminate\Foundation\Http\FormRequest;

class AddCreditsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            "credits" => "required",
            "credit_card" =>[
                "required",
                new OwnsCreditCard(),
            ]
        ];
    }
}
