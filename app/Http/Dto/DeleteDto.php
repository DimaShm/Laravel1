<?php
namespace App\Http\Dto;
final class DeleteDto {
    public function __construct(
        public readonly int $productId
    )
    {

    }
}
