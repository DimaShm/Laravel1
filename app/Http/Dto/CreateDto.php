<?php
namespace App\Http\Dto;
final class CreateDto {
    public function __construct(
        public readonly int    $ext_product_id,
        public readonly int    $category_id,
        public readonly string $name,
        public readonly string $description,
        public readonly int    $price,
        public readonly int    $old_price,
        public readonly bool   $stock,
    )
    {

    }
}
