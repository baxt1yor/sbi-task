<?php

namespace App\Dto;


use Illuminate\Contracts\Support\Arrayable;

final class MultiLanguageFiled implements Arrayable
{
    public string $uz {
        get => $this->uz;
        set => $this->uz = $value;
    }


    public string $ru {
        get => $this->ru;
        set => $this->ru = $value;
    }

    public string $cyrl {
        get => $this->cyrl;
        set => $this->cyrl = $value;
    }

    /**
     * @return array<string, string>
     */
    public function toArray() : array
    {
        return [
            'uz' => $this->uz,
            'ru' => $this->ru,
            'cyrl' => $this->cyrl
        ];
    }

    public static function fromArray(array $array) : self
    {
        $object = new self();

        if (isset($array['uz'])) {
            $object->uz = $array['uz'];
        }
        if (isset($array['ru'])) {
            $object->ru = $array['ru'];
        }
        if (isset($array['cyrl'])) {
            $object->cyrl = $array['cyrl'];
        }

        return $object;
    }
}
