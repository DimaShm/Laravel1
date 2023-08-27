<?php

namespace App\Http\Requests;

use App\Http\Dto\ReadDto;
use Illuminate\Foundation\Http\FormRequest;

class ReadPostRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return true;
    }

      public function rules(): array
    {
        return [
            'productId' => 'required|integer|min:0|max:1000|exists:products,id',
        ];
    }

    public function messages(): array
    {
        return [
            'productId.exists' => 'Product with this id was not found',
            'productId.required' => 'You need input the product id'
        ];
    }

    public function getDto(): ReadDto
    {
        return new ReadDto(
            $this->post('productId')
        );
    }
}
