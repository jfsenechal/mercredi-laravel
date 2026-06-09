<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('presence')) {
            Schema::table('presence', function (Blueprint $table): void {
                $table->rename('attendances');
            });
            Schema::table('attendances', function (Blueprint $table): void {
                $table->renameColumn('tuteur_id', 'guardian_id');
                $table->renameColumn('enfant_id', 'child_id');
                $table->renameColumn('jour_id', 'day_id');
                $table->renameColumn('paiement_id', 'payment_id');
                $table->renameColumn('ordre', 'position');
                $table->renameColumn('remarque', 'remark');
                $table->renameColumn('half', 'is_half_day');
                $table->renameColumn('confirmed', 'is_confirmed');
                $table->renameColumn('user_add', 'created_by');
                $table->dropColumn(['id_old', 'uuid']);
            });
        } else {
            Schema::create('attendances', function (Blueprint $table) {
                $table->id();
                $table->foreignId('guardian_id')->nullable()->constrained('guardians')->nullOnDelete();
                $table->foreignId('child_id')->nullable()->constrained('children')->nullOnDelete();
                $table->foreignId('day_id')->nullable()->constrained('days')->nullOnDelete();
                $table->foreignId('reduction_id')->nullable()->constrained('reductions')->nullOnDelete();
                $table->foreignId('payment_id')->nullable()->constrained('payments')->nullOnDelete();
                $table->smallInteger('absent')->default(0)->comment('-1 without certificate, 1 with certificate');
                $table->smallInteger('position')->default(0);
                $table->longText('remark')->nullable();
                $table->boolean('is_half_day')->default(false);
                $table->boolean('is_confirmed')->default(false);
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();

                $table->unique(['day_id', 'child_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
