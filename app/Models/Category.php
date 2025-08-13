<?php

namespace App\Models;

use App\Casts\MultiLanguageFieldCast;
use App\Dto\MultiLanguageFiled;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property MultiLanguageFiled $name
 * @property array<int, Product> $products
 */
class Category extends Model
{

    /** @var string  */
    protected $table = 'categories';

    /** @var array<int, string> */
    protected $fillable = [
        "id",
        "name"
    ];

    /** @var array<string, mixed> */
    protected $casts = [
        'name' => MultiLanguageFieldCast::class,
    ];

    /**
     * @return HasMany
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
