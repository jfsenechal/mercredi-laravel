<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained('guardians')->cascadeOnDelete();
            $table->foreignId('child_id')->constrained('children')->cascadeOnDelete();
            $table->date('date');
            $table->smallInteger('duration');
            $table->string('time', 50);
            $table->longText('remark')->nullable();
            $table->dateTime('late_at')->nullable();
            $table->boolean('is_free_bus')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->unique(['date', 'child_id', 'time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receptions');
    }
};
