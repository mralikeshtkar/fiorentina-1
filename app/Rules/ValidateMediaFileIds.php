<?php

namespace App\Rules;

use Botble\Media\Models\MediaFile;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateMediaFileIds implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $ids = json_decode($value);
        $mediaFileCount = MediaFile::query()
            ->whereIn('id', $ids)
            ->count();
        if (!(is_array($ids) && count($ids) && count($ids) == $mediaFileCount)) {
            $fail(':attributes are invalid.');
        }
    }
}
