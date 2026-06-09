<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('accueil')) {
            Schema::table('accueil', function (Blueprint $table): void {
                $table->rename('receptions');
            });
            Schema::table('receptions', function (Blueprint $table): void {
                $table->renameColumn('tuteur_id', 'guardian_id');
                $table->renameColumn('enfant_id', 'child_id');
                $table->renameColumn('date_jour', 'date');
                $table->renameColumn('duree', 'duration');
                $table->renameColumn('heure', 'time');
                $table->renameColumn('remarque', 'remark');
                $table->renameColumn('heure_retard', 'late_at');
                $table->renameColumn('free_bus', 'is_free_bus');
                $table->renameColumn('user_add', 'created_by');
                $table->dropColumn('uuid');
            });
        } else {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('receptions');
    }
};
