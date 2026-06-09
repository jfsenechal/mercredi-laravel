<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('user_ecole')) {
            Schema::table('user_ecole', function (Blueprint $table): void {
                $table->rename('school_user');
            });
            Schema::table('school_user', function (Blueprint $table): void {
                $table->renameColumn('ecole_id', 'school_id');
            });
        } else {
            Schema::create('school_user', function (Blueprint $table) {
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();

                $table->primary(['user_id', 'school_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('school_user');
    }
};
