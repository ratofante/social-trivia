<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class BaseQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:191', 'unique:questions'],
            'answer' => ['required', 'string', 'max:255'],
            'opt_1' => ['required', 'string', 'max:255'],
            'opt_2' => ['required', 'string', 'max:255'],
            'opt_3' => ['required', 'string', 'max:255'],
            'user_id' => ['nullable', 'exists:users,id'],
            'score' => ['nullable', 'integer', 'unsigned'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        $locale = app()->getLocale();

        if ($locale === 'es') {
            return [
                'question' => 'pregunta',
                'answer' => 'respuesta',
                'opt_1' => 'alternativa 1',
                'opt_2' => 'alternativa 2',
                'opt_3' => 'alternativa 3',
                'score' => 'puntaje',
                'category_id' => 'categoría'
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'question.required' => 'La pregunta es la parte más importante.',
            'question.max:191' => 'Máximo 191 caracteres.',
            'question.unique' => 'Esta pregunta ya figura en Trivium.',
            'answer.required' => 'En Trivium, todas las preguntas tienen respuesta.',
            'answer.max:255' => 'Máximo 255 caracteres.',
            'opt_1.required' => 'Las alternativas son necesarias para la trivia.',
            'opt_1.max:255' => 'Máximo 255 caracteres.',
            'opt_2.required' => 'Las alternativas son necesarias para la trivia.',
            'opt_2.max:255' => 'Máximo 255 caracteres.',
            'opt_3.required' => 'Las alternativas son necesarias para la trivia.',
            'opt_3.max:255' => 'Máximo 255 caracteres.',
            'score.integer' => 'El puntaje debe ser un número.',
            'category_id.required' => 'Debes asignar una categoría a tu pregunta.',
            'category_id.exists' => 'Ingresa una categoría existente.'
        ];
    }
}
