<?php

namespace App\Http\Requests;

use App\Enums\TalkType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTalkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->id == $this->talk->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => "exists:users,id",
            'title' => "required|max:255",
            "length" => "required",
            "type" => ["required", Rule::enum(TalkType::class)],
            "abstract" => "required",
            "organizer_notes" => "nullable"
        ];
    }
}
