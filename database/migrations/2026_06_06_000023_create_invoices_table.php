<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->nullable()->constrained('guardians')->nullOnDelete();
            $table->foreignId('camp_id')->nullable()->constrained('camps')->nullOnDelete();
            $table->dateTime('invoiced_at');
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->string('sent_to', 100)->nullable();
            $table->string('month', 100);
            $table->string('camp_name')->nullable();
            $table->string('schools')->nullable();
            $table->decimal('legacy_amount', 10, 2)->nullable();
            $table->boolean('legacy_closed')->nullable();
            $table->string('last_name', 150);
            $table->string('first_name', 50)->nullable();
            $table->string('street', 200)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 200)->nullable();
            $table->longText('remark')->nullable();
            $table->string('communication', 100)->nullable()->unique();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
