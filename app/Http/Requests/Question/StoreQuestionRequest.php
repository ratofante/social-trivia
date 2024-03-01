<?php

namespace App\Http\Requests\Question;

use App\Http\Requests\Question\BaseQuestionRequest;
use Illuminate\Support\Facades\Auth;

class StoreQuestionRequest extends BaseQuestionRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = Auth::user();
        if ($user && ($user->hasRole('admin') || $user->hasPermissionTo('question create'))) {
            return true;
        }
        return false;
    }
}
