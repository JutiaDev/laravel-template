<?php

namespace Tests\Builders\Stub;

use App\Models\User;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Mockery;

final class StubUser extends User
{
    public string $name;
    public string $email;
    public ?DateTimeImmutable $email_verified_at;
    public string $password;
    public string $remember_token;
    public DateTimeImmutable $created_at;
    public DateTimeImmutable $updated_at;

    // Relationships
    public Collection $roles;

    public function delete(): bool
    {
        $this->attributes['deleted_at'] = now();

        return true;
    }

    public function save(array $options = []): bool
    {
        return true;
    }

    /**
     * @param  array|string  $with
     * @return $this
     */
    public function fresh($with = []): self
    {
        return $this;
    }

    public function roles(): BelongsToMany
    {
        $eloquentBuilder = Mockery::spy(EloquentBuilder::class);

        $eloquentBuilder->shouldReceive('get')->andReturn($this->roles);

        return $this->newBelongsToMany(
            $eloquentBuilder,
            $this,
            '',
            '',
            '',
            '',
            ''
        );
    }
}