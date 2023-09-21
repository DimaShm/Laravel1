<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class UpdateProductException extends Exception
{
    protected $message = 'Failed to updating product';

    public function render(): Response
    {
        return response()->view('good.update', ['error' => $this->getMessage()]);
    }
}
