<?php

namespace App\Models;

use App\Casts\MultiLanguageFieldCast;
use App\Dto\MultiLanguageFiled;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property MultiLanguageFiled $name
 * @property float $price
 * @property string $barcode
 * @property int $categoryId
 * @property Category $category
 */
class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    /** @var string  */
    protected $table = 'products';

    /** @var array<int, string> */
    protected $fillable = [
        "name",
        "price",
        "barcode",
        "category_id"
    ];

    /** @var array<string, mixed> */
    protected $casts = [
        'name' => MultiLanguageFieldCast::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
