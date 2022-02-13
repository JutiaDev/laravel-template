<?php

namespace Tests\Unit\Application\Rules;

use Mockery;
use App\Rules\IsValidUserName;
use Illuminate\Contracts\Translation\Translator;
use PHPUnit\Framework\TestCase;

class IsValidUserNameTest extends TestCase
{
    private IsValidUserName $rule;

    public function setUp(): void
    {
        parent::setUp();

        $translator = Mockery::mock(Translator::class);
        $translator->shouldReceive('get')->andReturn('Invalid user name');

        $this->rule = new IsValidUserName($translator);
    }

    public function testThatReturnsTrueWithAValidUserName(): void
    {
        $value = 'mynaMe';

        $this->assertTrue($this->rule->passes('name', $value));
    }

    /**
     * @dataProvider invalidNames
     */
    public function testThatReturnsFalseWithAnInvalidUserName($invalidName): void
    {
        $this->assertFalse($this->rule->passes('name', $invalidName));
    }

    public function invalidNames(): array
    {
        return [
            ['short'],
            [12323],
            ['name@a']
        ];
    }
}