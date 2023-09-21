<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ReadProductException extends Exception
{
    protected $message = 'Failed to reading product';
    public function render(): Response
    {
        return response()->view('good.read', ['error' => $this->getMessage()]);
    }
}
