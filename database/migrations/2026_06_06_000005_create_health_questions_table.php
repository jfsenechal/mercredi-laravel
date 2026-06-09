<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('sante_question')) {
            Schema::table('sante_question', function (Blueprint $table): void {
                $table->rename('health_questions');
            });
            Schema::table('health_questions', function (Blueprint $table): void {
                $table->renameColumn('nom', 'name');
                $table->renameColumn('complement', 'has_complement');
                $table->renameColumn('categorie', 'category');
                $table->timestamps();
            });
        } else {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('health_questions');
    }
};
