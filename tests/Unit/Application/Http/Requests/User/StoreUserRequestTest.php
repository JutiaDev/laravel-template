<?php

namespace Tests\Unit\Application\Http\Requests\User;

use App\Http\Requests\User\StoreUserRequest;
use Tests\Builders\RoleBuilder;
use Tests\Builders\UserBuilder;
use Tests\Unit\Application\Http\Requests\Helpers\StubRepository;
use Tests\Unit\Application\Http\Requests\RequestTestCase;

class StoreUserRequestTest extends RequestTestCase
{
    public function testItValidatesRequestWhenTheGivenEmailIsUnique(): void
    {
        $parameters = [
            'email' => 'new@email.com',
        ];
        $this->assertTrue($this->validateParameters($parameters));
    }

    public function testItValidatesRequestWhenTheGivenEmailIsNotUnique(): void
    {
        // Arrange
        $user1 = (new UserBuilder())->withId(1)->withEmail('email1@example.com')->build();
        StubRepository::addToRepository($user1);
        $user2 = (new UserBuilder())->withId(2)->withEmail('email2@example.com')->build();
        StubRepository::addToRepository($user2);

        $params = ['email' => 'email1@example.com'];

        // Act && Assert
        $this->assertFalse($this->validateParameters($params));
    }

    public function testItValidatesRequestWhenTheGivenRoleExists(): void
    {
        $role = (new RoleBuilder())->build();
        StubRepository::addToRepository($role);

        $parameters = [
            'roles' => [$role->id],
        ];
        $this->assertTrue($this->validateParameters($parameters));
    }

    public function testItValidatesRequestWhenTheGivenRoleDoesNotExist(): void
    {
        $parameters = [
            'roles' => [1],
        ];
        $this->assertFalse($this->validateParameters($parameters));
    }

    protected function getRequestUnderTest(): string
    {
        return StoreUserRequest::class;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        StubRepository::clearRepository();
    }
}