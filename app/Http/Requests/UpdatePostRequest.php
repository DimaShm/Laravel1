<?php

namespace App\Http\Requests;

use App\Http\Dto\CreateDto;
use App\Http\Dto\UpdateDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UpdatePostRequest extends FormRequest
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
            'productName' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2|max:1000',
            'price' => 'required|integer|min:0|max:1000000',
            'oldPrice' => 'required|integer|min:0|max:1000000',
            'stock' => 'required|boolean',
        ];
    }

    public function messages(): array
    {

        return [
            'productId.exists' => 'Product with this id not found',
            'productId.required' => 'You need input the product id',
            'productName.required' => 'You need input the product name',
            'description.required' => 'You need input the product description',
            'price.required' => 'You need input the product price',
            'oldPrice.required' => 'You need input the old product price',
            'stock.boolean' => 'Stock must be boolean',
        ];
    }

    public function getDto(): UpdateDto
    {

        return new UpdateDto(
            $this->post('productId'),
            $this->post('productName'),
            $this->post('description'),
            $this->post('price'),
            $this->post('oldPrice'),
            $this->post('stock'),
        );
    }
}
