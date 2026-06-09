<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Invoice payments / settlements (legacy `facture_decompte`).
 */
return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('facture_decompte')) {
            Schema::table('facture_decompte', function (Blueprint $table): void {
                $table->rename('invoice_payments');
            });
            Schema::table('invoice_payments', function (Blueprint $table): void {
                $table->renameColumn('facture_id', 'invoice_id');
                $table->renameColumn('paye_le', 'paid_at');
                $table->renameColumn('montant', 'amount');
                $table->renameColumn('remarque', 'remark');
                $table->dropColumn('uuid');
            });
        } else {
            Schema::create('invoice_payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('invoice_id')->nullable()->constrained('invoices')->cascadeOnDelete();
                $table->dateTime('paid_at')->nullable();
                $table->decimal('amount', 10, 2);
                $table->longText('remark')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_payments');
    }
};
