<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('health_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('health_record_id')->constrained('health_records')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('health_questions')->cascadeOnDelete();
            $table->boolean('answer')->default(false);
            $table->string('remark')->nullable();
            $table->timestamps();

            $table->unique(['health_record_id', 'question_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('health_answers');
    }
};
