<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class BarcodeValidationRule implements ValidationRule
{
    private const int BARCODE_LENGTH = 13;

    private array $barcodeAlgorithmRes = [3, 1];

    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value) && !is_numeric($value))
        {
            $fail('The barcode must be a string.');
        }
        if (strlen($value) !== self::BARCODE_LENGTH)
        {
            $fail("The barcode must be ". self::BARCODE_LENGTH ." characters long.");
        }

        $resultBarcode = 0;

        for ($i = 0; $i < self::BARCODE_LENGTH-1; $i++)
        {
            $resultBarcode += (int)$value[$i] * $this->barcodeAlgorithmRes[($i+1) % 2];
        }

        $lastCheckNumber = (int)$value[self::BARCODE_LENGTH-1];

        $checkResBarCode = (10 - ($resultBarcode % 10)) % 10;

        if ($checkResBarCode !== $lastCheckNumber)
        {
            $fail('The barcode is invalid.');
        }
    }
}
