<?php
namespace App\Http\Dto;
final class ReadDto {
    public function __construct(
        public readonly int $productId
    )
    {

    }
}
