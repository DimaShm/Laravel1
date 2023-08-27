<?php

namespace App\Http\Requests;

use App\Http\Dto\DeleteDto;
use Illuminate\Foundation\Http\FormRequest;

class DeletePostRequest extends FormRequest
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
            'productId' => 'required|integer|min:1000|max:9999|exists:products,ext_product_id',
        ];
    }

    public function messages(): array
    {

        return [
            'productId.exists' => 'Product with this id was not found',
            'productId.required' => 'You need input the product id'
        ];
    }

    public function getDto(): DeleteDto
    {

        return new DeleteDto(
            $this->post('productId')
        );
    }
}
