<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'editName'=> 'required|string|max:255',
            'editPrice'=>'required|numeric|min:10000',
            'editPromotionPrice'=>'nullable|numeric|min:1000',
            'editUnit'=>'required|string',
            'editNew'=>'required|in:0,1',
            'editType'=>'required|numeric',
            'editImage'=>'required|image|mimes:jpeg,png,jpg,gif',
            'editDescription'=>'nullable|string|nullable'
        ];
    }
    public function messages(){
        return [
            'editName.required' => 'The name field is required.',
            'editName.string' => 'The name must be a valid string.',
            'editName.max' => 'The name may not exceed 255 characters.',

            'editPrice.required' => 'The price field is required.',
            'editPrice.numeric' => 'The price must be a valid number.',
            'editPrice.min' => 'The price must be at least 10,000.',

            'editPromotionPrice.required' => 'The promotion price field is required.',
            'editPromotionPrice.numeric' => 'The promotion price must be a valid number.',
            'editPromotionPrice.min' => 'The promotion price must be at least 10,000.',

            'editUnit.required' => 'The unit field is required.',
            'editUnit.string' => 'The unit must be a valid string.',

            'editNew.required' => 'The "new" field is required.',
            'editNew.in' => 'The "new" field must be either 0 or 1.',

            'editType.required' => 'The type field is required.',
            'editType.numeric' => 'The type must be a valid number.',

            'editImage.required' => 'The image field is required.',
            'editImage.image' => 'The uploaded file must be an image.',
            'editImage.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',

            'editDescription.required' => 'The description field is required.',
            'editDescription.string' => 'The description must be a valid string.',
            'editDescription.nullable' => 'The description field can be empty.',
        ];
    }
}
