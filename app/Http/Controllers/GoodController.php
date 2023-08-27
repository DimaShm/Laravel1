<?php

namespace App\Http\Controllers;

use App\Http\Dto\ReadDto;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\ReadPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GoodController extends Controller
{
    public function __construct()
    {
        $this->product = new Product();
    }
    public function create(CreatePostRequest $request): View
    {
        $dto = $request->getDto();
        $createdProduct = $this->product->createRecord($dto);
        if ($createdProduct) {
            session()->flash('success', 'The new product was created');
        } else {
            session()->flash('error', 'Failed to create product');
        }
        return view('crud.create');
    }

    public function read(ReadPostRequest $request): View
    {
        $dto = $request->getDto();
        $readProduct = $this->product->readRecord($dto);

        if ($readProduct) {
            session()->flash('success', $readProduct);
        } else {
            session()->flash('error', 'Failed to reading product');
        }

        return view('crud.read');
    }

    public function update(UpdatePostRequest $request): View
    {
        $dto = $request->getDto();

        $updatedProduct = $this->product->updateRecord($dto);

        if ($updatedProduct) {
            session()->flash('success', 'The product was updated');
        } else {
            session()->flash('error', 'Failed to update product');
        }

        return view('crud.update');
    }
    public function delete(DeletePostRequest $request): View
    {
        $dto = $request->getDto();
        $deletedProduct = $this->product->deleteRecord($dto);

        if ($deletedProduct) {
            session()->flash('success', "Successfully deleting data with id {$dto->productId}");
        } else {
            session()->flash('error', "Failed to delete data with id {$dto->productId}");
        }

        return view('crud.delete');
    }
}
