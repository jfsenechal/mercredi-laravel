<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('annee_scolaire')) {
            Schema::table('annee_scolaire', function (Blueprint $table): void {
                $table->rename('school_years');
            });
            Schema::table('school_years', function (Blueprint $table): void {
                $table->renameColumn('annee_suivante_id', 'next_year_id');
                $table->renameColumn('groupe_scolaire_id', 'school_group_id');
                $table->renameColumn('ordre', 'position');
                $table->renameColumn('nom', 'name');
                $table->renameColumn('remarque', 'remark');
                $table->timestamps();
            });
        } else {
            Schema::create('school_years', function (Blueprint $table) {
                $table->id();
                $table->foreignId('next_year_id')->nullable()->constrained('school_years')->nullOnDelete();
                $table->foreignId('school_group_id')->nullable()->constrained('school_groups')->nullOnDelete();
                $table->integer('position')->default(0);
                $table->string('name', 150);
                $table->longText('remark')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};
