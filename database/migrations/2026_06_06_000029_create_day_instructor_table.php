<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('day_instructor', function (Blueprint $table) {
            $table->foreignId('instructor_id')->constrained('instructors')->cascadeOnDelete();
            $table->foreignId('day_id')->constrained('days')->cascadeOnDelete();

            $table->primary(['instructor_id', 'day_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_instructor');
    }
};
