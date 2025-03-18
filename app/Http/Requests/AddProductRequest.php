<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'inputName'=> 'required|string|max:255',
            'inputPrice'=>'required|numeric|min:10000',
            'inputPromotionPrice'=>'nullable|numeric|min:1000',
            'inputUnit'=>'required|string',
            'inputNew'=>'required|in:0,1',
            'inputType'=>'required|numeric',
            'inputImage'=>'required|image|mimes:jpeg,png,jpg,gif',
            'inputDescription'=>'nullable|string|nullable'
        ];
    }
    public function messages(){
        return [
            'inputName.required' => 'The name field is required.',
            'inputName.string' => 'The name must be a valid string.',
            'inputName.max' => 'The name may not exceed 255 characters.',

            'inputPrice.required' => 'The price field is required.',
            'inputPrice.numeric' => 'The price must be a valid number.',
            'inputPrice.min' => 'The price must be at least 10,000.',

            'inputPromotionPrice.required' => 'The promotion price field is required.',
            'inputPromotionPrice.numeric' => 'The promotion price must be a valid number.',
            'inputPromotionPrice.min' => 'The promotion price must be at least 10,000.',

            'inputUnit.required' => 'The unit field is required.',
            'inputUnit.string' => 'The unit must be a valid string.',

            'inputNew.required' => 'The "new" field is required.',
            'inputNew.in' => 'The "new" field must be either 0 or 1.',

            'inputType.required' => 'The type field is required.',
            'inputType.numeric' => 'The type must be a valid number.',

            'inputImage.required' => 'The image field is required.',
            'inputImage.image' => 'The uploaded file must be an image.',
            'inputImage.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',

            'inputDescription.required' => 'The description field is required.',
            'inputDescription.string' => 'The description must be a valid string.',
            'inputDescription.nullable' => 'The description field can be empty.',
        ];
    }
}
