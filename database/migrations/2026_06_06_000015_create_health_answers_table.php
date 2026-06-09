<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('sante_reponse')) {
            Schema::table('sante_reponse', function (Blueprint $table): void {
                $table->rename('health_answers');
            });
            Schema::table('health_answers', function (Blueprint $table): void {
                $table->renameColumn('sante_fiche_id', 'health_record_id');
                $table->renameColumn('reponse', 'answer');
                $table->renameColumn('remarque', 'remark');
                $table->dropColumn('id_old');
                $table->timestamps();
            });
        } else {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('health_answers');
    }
};
