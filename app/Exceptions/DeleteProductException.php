<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;


class DeleteProductException extends Exception
{
    protected $message = 'Failed to deleting product';

    public function render(): Response
    {
        return response()->view('good.delete', ['error' => $this->getMessage()]);
    }
}
