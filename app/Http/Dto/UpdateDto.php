<?php
namespace App\Http\Dto;
final class UpdateDto {
    public function __construct(
        public readonly int    $id,
        public readonly string $name,
        public readonly string $description,
        public readonly int    $price,
        public readonly int    $old_price,
        public readonly bool   $stock,
    )
    {

    }
}
