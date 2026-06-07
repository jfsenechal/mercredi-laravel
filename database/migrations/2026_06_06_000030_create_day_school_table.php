<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('day_school', function (Blueprint $table) {
            $table->foreignId('day_id')->constrained('days')->cascadeOnDelete();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();

            $table->primary(['day_id', 'school_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_school');
    }
};
