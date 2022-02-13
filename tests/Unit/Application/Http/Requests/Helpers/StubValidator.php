<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Http\Requests\Helpers;

use Illuminate\Validation\Validator;

final class StubValidator extends Validator
{
    public function __construct(array $data, array $rules)
    {
        parent::__construct(new StubTranslator(), $data, $rules, []);
    }

    public function validateExists($attribute, $value, $parameters): bool
    {
        $columnId = $value;
        $tableName = $parameters[0] ?? '';
        $columnName = $parameters[1] ?? '';

        if ($attribute !== 'id' && ($columnName !== '' && $columnName !== 'id')) {
            return StubRepository::has($attribute, $columnId, $value);
        }

        if (is_array($columnId)) {
            return StubRepository::allExist($tableName, $columnId);
        }

        return StubRepository::exists($tableName, $columnId);
    }

    public function validateUnique($attribute, $value, $parameters): bool
    {
        $tableName = $parameters[0] ?? '';
        $columnName = $parameters[1] ?? '';

        return !(StubRepository::has($tableName, $columnName, $value));
    }
}
