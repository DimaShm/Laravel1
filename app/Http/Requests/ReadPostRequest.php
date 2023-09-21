<?php

namespace App\Http\Requests;

use App\Http\Dto\ReadDto;

class ReadPostRequest extends AppFormRequest
{
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

    public function getDto(): ReadDto
    {
        return new ReadDto(
            $this->post('productId')
        );
    }
}
