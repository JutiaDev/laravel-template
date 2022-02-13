<?php

namespace App\Providers;

use App\Rules\IsValidUserName;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Support\ServiceProvider;

class CustomFormValidatorServiceProvider extends ServiceProvider
{
    public function boot(ValidationFactory $validator): void
    {
        $validator->extend('isValidUserName', IsValidUserName::class . '@passes');
    }
}