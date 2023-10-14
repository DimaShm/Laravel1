<?php

namespace App\Http\Controllers;

use App\Exceptions\CreateProductException;
use App\Exceptions\DeleteProductException;
use App\Exceptions\ReadProductException;
use App\Exceptions\UpdateProductException;
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

        if (!$createdProduct) {
            throw new CreateProductException();
        }

        return view('good.create', ['success' => 'The new product was created']);
    }

    public function show(ReadPostRequest $request): View
    {
        $dto = $request->getDto();
        $readProduct = $this->product->readRecord($dto);

        if (!$readProduct) {
            throw new ReadProductException();
        }

        return view('good.read', ['success' => $readProduct]);
    }

    public function update(UpdatePostRequest $request): View
    {
        $dto = $request->getDto();
        $updatedProduct = $this->product->updateRecord($dto);

        if (!$updatedProduct) {
            throw new UpdateProductException();
        }

        return view('good.update', ['success' => 'The product was updated']);
    }

    public function destroy(DeletePostRequest $request): View
    {
        $dto = $request->getDto();
        $deletedProduct = $this->product->deleteRecord($dto);

        if (!$deletedProduct) {
            throw new DeleteProductException();
        }

        return view('good.delete', ['success' => "Successfully deleting data with id {$dto->productId}"]);
    }
}
