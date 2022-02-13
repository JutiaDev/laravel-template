<?php

namespace App\Rules;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;

class IsValidUserName implements Rule
{

    private Translator $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function message(): string
    {
        return $this->translator->get('validation.name');
    }

    public function passes($attribute, $value): bool
    {
        return is_string($value) && preg_match('/^[a-zA-Z]{6}$/m', $value) === 1;
    }
}
