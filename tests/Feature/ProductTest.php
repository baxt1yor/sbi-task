<?php

use App\Dto\MultiLanguageFiled;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can create product', function () {
    Category::query()->create(['name' => MultiLanguageFiled::fromArray([
        'cyrl' => 'Chair',
        'ru' => 'Стул',
        'uz' => 'Stul',
    ])]);

    $data = [
        'name' => MultiLanguageFiled::fromArray([
            'cyrl' => 'Chair',
            'ru' => 'Стул',
            'uz' => 'Stul',
        ]),
        'price' => 10000,
        'barcode' => '8711253001202',
        'category_id' => Category::query()->first()?->id,
    ];

    $response = $this->postJson('/api/products', $data);

    $response->assertStatus(201);
    expect(Product::query()->count())->toBe(1);
});

