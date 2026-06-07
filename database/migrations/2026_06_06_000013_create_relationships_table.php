<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained('guardians')->cascadeOnDelete();
            $table->foreignId('child_id')->constrained('children')->cascadeOnDelete();
            $table->string('type', 200)->nullable()->comment('father, mother, step-father...');
            $table->smallInteger('position')->default(0);
            $table->timestamps();

            $table->unique(['guardian_id', 'child_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
