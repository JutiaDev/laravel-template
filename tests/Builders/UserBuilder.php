<?php

declare(strict_types=1);

namespace Tests\Builders;

use DateTimeImmutable;
use Illuminate\Support\Collection;
use Tests\Builders\Stub\StubUser;

final class UserBuilder
{
    private int $id;
    private string $name;
    private string $email;
    private ?DateTimeImmutable $email_verified_at;
    private string $password;
    private string $remember_token;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    // Relationships
    private Collection $roles;

    public function __construct()
    {
        $this->id = 1;
        $this->name = '';
        $this->email = '';
        $this->email_verified_at = null;
        $this->password = '';
        $this->remember_token = '';
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();

        $this->roles = new Collection([]);
    }

    public function build(): StubUser
    {
        $user = new StubUser();
        $user->setDateFormat('Y-m-d');
        $user->id = $this->id;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->email_verified_at = $this->email_verified_at;
        $user->password = $this->password;
        $user->remember_token = $this->remember_token;
        $user->created_at = $this->createdAt;
        $user->updated_at = $this->updatedAt;

        $user->roles = $this->roles;

        return $user;
    }

    public function withId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function withRoles(array $roles): self
    {
        $this->roles = new Collection($roles);

        return $this;
    }
}