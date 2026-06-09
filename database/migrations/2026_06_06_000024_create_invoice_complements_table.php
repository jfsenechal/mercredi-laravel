<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('facture_complement')) {
            Schema::table('facture_complement', function (Blueprint $table): void {
                $table->rename('invoice_complements');
            });
            Schema::table('invoice_complements', function (Blueprint $table): void {
                $table->renameColumn('facture_id', 'invoice_id');
                $table->renameColumn('pourcentage', 'percentage');
                $table->renameColumn('date_le', 'dated_at');
                $table->renameColumn('nom', 'name');
                $table->dropColumn('uuid');
            });
        } else {
            Schema::create('invoice_complements', function (Blueprint $table) {
                $table->id();
                $table->foreignId('invoice_id')->nullable()->constrained('invoices')->cascadeOnDelete();
                $table->decimal('amount', 10, 2)->nullable();
                $table->decimal('percentage', 5, 2)->nullable();
                $table->dateTime('dated_at');
                $table->string('name', 150);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_complements');
    }
};
