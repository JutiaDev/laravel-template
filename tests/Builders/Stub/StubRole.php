<?php

namespace Tests\Builders\Stub;

use App\Models\Role;
use DateTimeImmutable;
use Illuminate\Support\Collection;

final class StubRole extends Role
{
    public int $id;
    public string $name;
    public DateTimeImmutable $created_at;
    public DateTimeImmutable $updated_at;

    // Relationships
    public Collection $users;
}