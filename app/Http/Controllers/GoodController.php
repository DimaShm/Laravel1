<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\ReadPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Product;
use Illuminate\View\View;

class GoodController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function create(CreatePostRequest $request): View
    {
        $dto = $request->getDto();
        $createdProduct = $this->product->createRecord($dto);

        if ($createdProduct) {
            $message = ['success' => 'The new product was created'];
        } else {
            $message = ['error' => 'Failed to create product'];
        }

        return view('good.create')->with($message);
    }

    public function read(ReadPostRequest $request): View
    {
        $dto = $request->getDto();
        $readProduct = $this->product->readRecord($dto);

        if ($readProduct) {
            $message = ['success' => $readProduct];
        } else {
            $message = ['error' => 'Failed to reading product'];
        }

        return view('good.read')->with($message);
    }

    public function update(UpdatePostRequest $request): View
    {
        $dto = $request->getDto();

        $updatedProduct = $this->product->updateRecord($dto);

        if ($updatedProduct) {
            $message = ['success' => 'The product was updated'];
        } else {
            $message = ['error' => 'Failed to update product'];
        }

        return view('good.update')->with($message);
    }
    public function delete(DeletePostRequest $request): View
    {
        $dto = $request->getDto();
        $deletedProduct = $this->product->deleteRecord($dto);
        if ($deletedProduct) {
            $message = ['success' => "Successfully deleting data with id {$dto->productId}"];
        } else {
            $message = ['error' => "Failed to delete data with id {$dto->productId}"];
        }

        return view('good.delete')->with($message);
    }
}
