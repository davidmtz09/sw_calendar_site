<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class Put extends FormRequest
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
            "title" => "required|min:5|max:255",
            "desc" => "required|min:5|max:255|unique:appointments,desc,".$this->route("appointment")->id,
            // "date_at" => "required",
            // "hour" => "required",
            // "date_end" => "required",
            // "hour_end" => "required",
        ];
    }
}
