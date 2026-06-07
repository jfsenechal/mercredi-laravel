<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('health_questions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->boolean('has_complement')->default(false);
            $table->string('complement_label', 180)->nullable();
            $table->integer('display_order')->nullable();
            $table->string('category', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('health_questions');
    }
};
