<?php

namespace App\Models;

use App\Http\Dto\CreateDto;
use App\Http\Dto\DeleteDto;
use App\Http\Dto\ReadDto;
use App\Http\Dto\UpdateDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ext_product_id', 'category_id', 'name', 'description', 'price', 'old_price', 'stock'
    ];
    public function createRecord(CreateDto $dto)
    {

        return $this->create([
            'ext_product_id' => $dto->productId,
            'category_id' => $dto->categoryId,
            'name' => $dto->name,
            'description' => $dto->description,
            'price' => $dto->price,
            'old_price' => $dto->oldPrice,
            'stock' => $dto->stock,
        ]);
    }

    public function readRecord(ReadDto $dto)
    {
        $product = Product::where('ext_product_id', $dto->productId)->first();

        return $product;
    }

    public function updateRecord(UpdateDto $dto): bool
    {
        $product = Product::where('ext_product_id', $dto->productId)->first();
        if ($product) {

            return $product->update([
                'name' => $dto->name,
                'description' => $dto->description,
                'price' => $dto->price,
                'old_price' => $dto->oldPrice,
                'stock' => $dto->stock,
            ]);
        }

        return false;
    }

    public function deleteRecord(DeleteDto $dto): bool
    {
        return Product::where('ext_product_id', $dto->productId)->delete();
    }
}
