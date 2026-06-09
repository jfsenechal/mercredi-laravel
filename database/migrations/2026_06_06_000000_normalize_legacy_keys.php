<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Normalizes the legacy MariaDB schema (`data/mercredi.sql`) so its primary and
 * foreign keys use `BIGINT UNSIGNED` instead of the legacy `int(11)`, matching the
 * types Laravel's `id()` / `foreignId()` generate on a fresh install.
 *
 * This must run before the table/column rename migrations: a referenced primary
 * key cannot be altered while any foreign key still points at it, so every legacy
 * foreign key is dropped, the integer key columns are widened, then the foreign
 * keys are recreated (now type-compatible). On a fresh install there is no legacy
 * schema, so this migration is a no-op.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Only relevant when migrating on top of the imported legacy schema.
        if (! Schema::hasTable('tuteur')) {
            return;
        }

        $database = DB::connection()->getDatabaseName();

        /** @var list<object{TABLE_NAME: string, COLUMN_NAME: string, CONSTRAINT_NAME: string, REFERENCED_TABLE_NAME: string, REFERENCED_COLUMN_NAME: string, DELETE_RULE: string, UPDATE_RULE: string}> $foreignKeys */
        $foreignKeys = DB::select(
            'SELECT k.TABLE_NAME, k.COLUMN_NAME, k.CONSTRAINT_NAME,
                    k.REFERENCED_TABLE_NAME, k.REFERENCED_COLUMN_NAME,
                    r.DELETE_RULE, r.UPDATE_RULE
             FROM information_schema.KEY_COLUMN_USAGE k
             JOIN information_schema.REFERENTIAL_CONSTRAINTS r
               ON r.CONSTRAINT_SCHEMA = k.TABLE_SCHEMA
              AND r.CONSTRAINT_NAME = k.CONSTRAINT_NAME
             WHERE k.TABLE_SCHEMA = ?
               AND k.REFERENCED_TABLE_NAME IS NOT NULL',
            [$database]
        );

        /** @var list<object{TABLE_NAME: string, COLUMN_NAME: string, IS_NULLABLE: string, EXTRA: string}> $columns */
        $columns = DB::select(
            "SELECT TABLE_NAME, COLUMN_NAME, IS_NULLABLE, EXTRA
             FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = ?
               AND DATA_TYPE = 'int'
               AND (COLUMN_NAME = 'id' OR COLUMN_NAME LIKE '%\\_id')",
            [$database]
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($foreignKeys as $fk) {
            DB::statement("ALTER TABLE `{$fk->TABLE_NAME}` DROP FOREIGN KEY `{$fk->CONSTRAINT_NAME}`");
        }

        foreach ($columns as $column) {
            $nullable = $column->IS_NULLABLE === 'YES' ? 'NULL' : 'NOT NULL';
            $autoIncrement = str_contains($column->EXTRA, 'auto_increment') ? ' AUTO_INCREMENT' : '';

            DB::statement(
                "ALTER TABLE `{$column->TABLE_NAME}` ".
                "MODIFY `{$column->COLUMN_NAME}` BIGINT UNSIGNED {$nullable}{$autoIncrement}"
            );
        }

        foreach ($foreignKeys as $fk) {
            DB::statement(
                "ALTER TABLE `{$fk->TABLE_NAME}` ".
                "ADD CONSTRAINT `{$fk->CONSTRAINT_NAME}` FOREIGN KEY (`{$fk->COLUMN_NAME}`) ".
                "REFERENCES `{$fk->REFERENCED_TABLE_NAME}` (`{$fk->REFERENCED_COLUMN_NAME}`) ".
                "ON DELETE {$fk->DELETE_RULE} ON UPDATE {$fk->UPDATE_RULE}"
            );
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    public function down(): void
    {
        // Irreversible: the legacy integer key widths are not restored.
    }
};
