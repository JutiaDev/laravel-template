<?php

declare(strict_types=1);

namespace Tests\Builders;

use DateTimeImmutable;
use Illuminate\Support\Collection;
use Tests\Builders\Stub\StubRole;

final class RoleBuilder
{
    private int $id;
    private string $name;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    // Relationships
    private Collection $users;

    public function __construct()
    {
        $this->id = 1;
        $this->name = '';
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();

        $this->users = new Collection([]);
    }

    public function build(): StubRole
    {
        $role = new StubRole();
        $role->setDateFormat('Y-m-d');
        $role->id = $this->id;
        $role->name = $this->name;
        $role->created_at = $this->createdAt;
        $role->updated_at = $this->updatedAt;

        $role->users = $this->users;

        return $role;
    }

    public function withId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function withUsers(Collection $users): self
    {
        $this->users = $users;

        return $this;
    }
}