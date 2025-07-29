<?php

namespace App\Casts;

use App\Dto\MultiLanguageFiled;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class MultiLanguageFieldCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): MultiLanguageFiled
    {
        $array = [];
        if (is_array($value))
        {
            $array = $value;
        }

        if (json_validate($value))
        {
            $array = json_decode($value, true);
        }

        $response = new MultiLanguageFiled();

        if (isset($array['ru'])) {
            $response->ru = $array['ru'];
        }

        if (isset($array['uz'])) {
            $response->uz = $array['uz'];
        }

        if (isset($array['cyrl'])) {
            $response->cyrl = $array['cyrl'];
        }

        return $response;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value instanceof MultiLanguageFiled)
        {
            return json_encode($value->toArray(), true);
        }

        if (! is_null($value)) return null;

        return json_encode($value, true);
    }
}
