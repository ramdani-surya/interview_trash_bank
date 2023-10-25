<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTrashTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (Auth::check()) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('trashType')->id;

        return [
            'type_name'   => "required|unique:App\Models\TrashType,type_name,$id",
            'price'       => 'required|numeric|min:1',
            'description' => 'nullable',
            'image'       => 'nullable|mimes:jpg,png',
        ];
    }
}
