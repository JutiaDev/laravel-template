<?php

namespace Tests\Unit\Application\Models;

use PHPUnit\Framework\TestCase;
use Tests\Builders\RoleBuilder;
use Tests\Builders\UserBuilder;

class UserTest extends TestCase
{
    public function testHasRoles(): void
    {
        $role1 = (new RoleBuilder())->withId(1)->build();
        $role2 = (new RoleBuilder())->withId(2)->build();
        $user = (new UserBuilder())->withRoles([$role1, $role2])->build();

        $roles = $user->roles()->get();

        $this->assertCount(2, $roles);
    }
}