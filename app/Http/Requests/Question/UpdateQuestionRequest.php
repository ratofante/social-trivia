<?php

namespace App\Http\Requests\Question;

use App\Http\Requests\Question\BaseQuestionRequest;
use Illuminate\Support\Facades\Auth;

class UpdateQuestionRequest extends BaseQuestionRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()) return true;
        return false;
    }
}
