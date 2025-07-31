<?php

namespace App\Http\Controllers;

use App\Contracts\IProductService;
use App\Exports\ProductExportExcel;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Maatwebsite\Excel\Excel;

class ProductController extends Controller
{
    public function __construct(
        private readonly IProductService $productService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        return $this->productService->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->productService->getById($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        return $this->productService->update($product, $request->validated());
    }

    public function export()
    {
        return Excel::download(new ProductExportExcel(), 'products.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return response()->noContent();
    }
}
