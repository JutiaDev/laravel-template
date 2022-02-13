<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Http\Requests\Helpers;

use Illuminate\Database\Eloquent\Model;

final class StubRepository
{
    private static array $repository = [];

    public static function addToRepository(Model $model): void
    {
        $table = $model->getTable();
        if (str_starts_with($table, 'stub_')) {
            $table = str_replace('stub_', '', $table);
        }

        if (!array_key_exists($table, self::$repository)) {
            self::$repository[$table] = [];
        }

        self::$repository[$table][$model->id] = $model;
    }

    public static function exists(string $tableName, int $columnId): bool
    {
        if (!array_key_exists($tableName, self::$repository)) {
            return false;
        }

        return array_key_exists($columnId, self::$repository[$tableName]);
    }

    public static function allExist(string $tableName, array $columnIds): bool
    {
        $truthTable = [];
        foreach ($columnIds as $columnId) {
            $truthTable[] = self::exists($tableName, $columnId);
        }

        return !in_array(false, $truthTable, true);
    }

    public static function has(string $tableName, string $columnName, string $value): bool
    {
        if (!array_key_exists($tableName, self::$repository)) {
            return false;
        }

        foreach (self::$repository[$tableName] as $model) {
            if (isset($model->$columnName) && $model->$columnName === $value) {
                return true;
            }
        }

        return false;
    }

    public static function find(string $tableName, int $id): ?Model
    {
        if (!array_key_exists($tableName, self::$repository)) {
            return null;
        }

        foreach (self::$repository[$tableName] as $model) {
            if (isset($model->id) && $model->id === $id) {
                return $model;
            }
        }

        return null;
    }

    public static function clearRepository(): void
    {
        self::$repository = [];
    }
}
