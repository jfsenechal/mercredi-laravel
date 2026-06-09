<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('sante_fiche')) {
            Schema::table('sante_fiche', function (Blueprint $table): void {
                $table->rename('health_records');
            });
            Schema::table('health_records', function (Blueprint $table): void {
                $table->renameColumn('enfant_id', 'child_id');
                $table->renameColumn('personne_urgence', 'emergency_contact');
                $table->renameColumn('medecin_nom', 'doctor_name');
                $table->renameColumn('medecin_telephone', 'doctor_phone');
                $table->renameColumn('accompagnateurs', 'companions');
                $table->renameColumn('remarque', 'remark');
                $table->dropColumn('id_old');
            });
        } else {
            Schema::create('health_records', function (Blueprint $table) {
                $table->id();
                $table->foreignId('child_id')->unique()->constrained('children')->cascadeOnDelete();
                $table->longText('emergency_contact');
                $table->string('doctor_name', 200);
                $table->string('doctor_phone', 200);
                $table->longText('companions')->nullable();
                $table->longText('remark')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
