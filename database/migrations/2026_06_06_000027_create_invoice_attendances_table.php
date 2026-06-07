<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Invoice attendance lines (legacy `facture_presence`). Snapshots the billed
 * presence at invoicing time.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->cascadeOnDelete();
            $table->foreignId('reduction_id')->nullable()->constrained('reductions')->nullOnDelete();
            $table->foreignId('child_id')->nullable()->constrained('children')->nullOnDelete();
            $table->string('time')->nullable();
            $table->integer('duration')->nullable();
            $table->date('attendance_date');
            $table->decimal('gross_cost', 10, 2);
            $table->decimal('calculated_cost', 10, 2);
            $table->unsignedBigInteger('attendance_id');
            $table->string('object_type', 100);
            $table->string('last_name', 150);
            $table->string('first_name', 50)->nullable();
            $table->boolean('is_pedagogical')->default(false);
            $table->smallInteger('position')->default(0);
            $table->smallInteger('absent')->default(0)->comment('-1 without certificate, 1 with certificate');
            $table->string('reason')->nullable();
            $table->timestamps();

            $table->unique(['attendance_id', 'object_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_attendances');
    }
};
