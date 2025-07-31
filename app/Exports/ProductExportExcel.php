<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExportExcel implements FromCollection, ShouldQueue
{

    use RemembersChunkOffset;

    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        $products = collect();

        Product::query()->with('category')->chunk(100, function ($chunk) use ($products) {
            $chunk->each(function (Product $product) use ($products) {
                $products->push([
                    'Name' => $product->name,
                    'BarCode' => $product->barcode,
                    'Price' => $product->price,
                    'Category' => $product->category?->name,
                ]);
            });
        });

        return $products;
    }
}
