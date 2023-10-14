<?php
namespace App\Http\Dto;

final class UpdateDto {
    public function __construct(
        public readonly int    $productId,
        public readonly string $name,
        public readonly string $description,
        public readonly int    $price,
        public readonly int    $oldPrice,
        public readonly bool   $stock,
    )
    {
    }
}
