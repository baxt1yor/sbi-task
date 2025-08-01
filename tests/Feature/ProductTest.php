<?php

use App\Dto\MultiLanguageFiled;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can create product', function () {
    $category = Category::query()->create(['name' => MultiLanguageFiled::fromArray([
        'cyrl' => 'Chair',
        'ru' => 'Стул',
        'uz' => 'Stul',
    ])]);

    $request = [
        'name' => [
            'cyrl' => 'Chair',
            'ru' => 'Стул',
            'uz' => 'Stul',
        ],
        'price' => 10000,
        'barcode' => '8711253001202',
        'category_id' => $category->id,
    ];

    $response = $this->postJson(route('products.store'), $request);

    $response->assertCreated();

    $this->assertDatabaseHas(app(Product::class)->getTable(), [
        'price' => 10000,
        'barcode' => '8711253001202',
        'name->ru' => 'Стул',
    ]);
});

test('can update product', function () {
    $category = Category::query()->create(['name' => MultiLanguageFiled::fromArray([
        'cyrl' => 'Chair',
        'ru' => 'Стул',
        'uz' => 'Stul',
    ])]);

    $product = Product::query()->create([
        'name' => MultiLanguageFiled::fromArray([
            'cyrl' => 'Chair',
            'ru' => 'Стул',
            'uz' => 'Stul',
        ]),
        'price' => 10000,
        'barcode' => '8711253001202',
        'category_id' => $category->id,
    ]);

    $request = [
        'name' => MultiLanguageFiled::fromArray([
            'cyrl' => 'Chair',
            'ru' => 'Стул',
            'uz' => 'Stul',
        ]),
        'price' => 100000,
        'barcode' => '8711253001202',
        'category_id' => $category->id,
    ];

    $response = $this->putJson(route('products.update', $product->id), $request);

    $response->assertOk();
    expect((double)Product::query()->find($product->id)->price)->toBe((double)100000.00);
});

