<?php

namespace App\Contracts;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;

interface IProductService
{
    public function getAll(): ProductCollection;

    public function getById(Product $product): ProductResource;

    public function create(array $data): ProductResource;

    public function update(Product $product, array $data): ProductResource;

    public function delete(Product $product): void;
}
