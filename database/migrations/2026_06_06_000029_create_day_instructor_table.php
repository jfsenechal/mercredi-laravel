<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('animateur_jour')) {
            Schema::table('animateur_jour', function (Blueprint $table): void {
                $table->rename('day_instructor');
            });
            Schema::table('day_instructor', function (Blueprint $table): void {
                $table->renameColumn('animateur_id', 'instructor_id');
                $table->renameColumn('jour_id', 'day_id');
            });
        } else {
            Schema::create('day_instructor', function (Blueprint $table) {
                $table->foreignId('instructor_id')->constrained('instructors')->cascadeOnDelete();
                $table->foreignId('day_id')->constrained('days')->cascadeOnDelete();

                $table->primary(['instructor_id', 'day_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('day_instructor');
    }
};
