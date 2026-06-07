<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 150);
            $table->string('first_name', 50)->nullable();
            $table->string('street', 200)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('partner_relation', 200)->nullable();
            $table->string('partner_last_name', 200)->nullable();
            $table->string('partner_first_name', 200)->nullable();
            $table->string('partner_phone', 150)->nullable();
            $table->string('partner_office_phone', 150)->nullable();
            $table->string('partner_mobile', 150)->nullable();
            $table->string('partner_email', 150)->nullable();
            $table->longText('remark')->nullable();
            $table->string('gender', 150)->nullable();
            $table->string('phone', 150)->nullable();
            $table->string('office_phone', 150)->nullable();
            $table->string('mobile', 150)->nullable();
            $table->boolean('is_archived')->default(false);
            $table->boolean('wants_paper_invoice')->nullable();
            $table->string('iban', 50)->nullable();
            $table->string('national_register_number', 150)->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
