<?php

namespace App\Casts;

use App\Dto\MultiLanguageFiled;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class MultiLanguageFieldCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): ?MultiLanguageFiled
    {
        return MultiLanguageFiled::fromArray(json_decode($value, true));
    }

    public function set($model, string $key, $value, array $attributes): array
    {
        return [$key => json_encode($value)];
    }
}
