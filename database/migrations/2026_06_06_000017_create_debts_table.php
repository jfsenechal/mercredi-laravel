<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('creance')) {
            Schema::table('creance', function (Blueprint $table): void {
                $table->rename('debts');
            });
            Schema::table('debts', function (Blueprint $table): void {
                $table->renameColumn('tuteur_id', 'guardian_id');
                $table->renameColumn('montant', 'amount');
                $table->renameColumn('date_le', 'dated_at');
                $table->renameColumn('paye_le', 'paid_at');
                $table->renameColumn('nom', 'name');
                $table->renameColumn('remarque', 'remark');
                $table->renameColumn('user_add', 'created_by');
                $table->dropColumn('uuid');
            });
        } else {
            Schema::create('debts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('guardian_id')->constrained('guardians')->cascadeOnDelete();
                $table->decimal('amount', 10, 2);
                $table->dateTime('dated_at')->nullable();
                $table->dateTime('paid_at')->nullable();
                $table->string('name', 150);
                $table->longText('remark')->nullable();
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
