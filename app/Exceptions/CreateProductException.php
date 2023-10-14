<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CreateProductException extends Exception
{
    protected $message = 'Failed to creating product';

    public function render(): Response
    {
        return response()->view('good.create', ['error' => $this->getMessage()]);
    }
}
