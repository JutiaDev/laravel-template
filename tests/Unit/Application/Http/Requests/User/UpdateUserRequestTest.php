<?php

namespace Tests\Unit\Application\Http\Requests\User;

use App\Http\Requests\User\UpdateUserRequest;
use Tests\Unit\Application\Http\Requests\RequestTestCase;

class UpdateUserRequestTest extends RequestTestCase
{
    protected function getRequestUnderTest(): string
    {
        return UpdateUserRequest::class;
    }
}