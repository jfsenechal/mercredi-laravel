<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Scheduled invoice mailing jobs (legacy `facture_cron`).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice_crons', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_done')->default(false);
            $table->string('from_address', 50);
            $table->string('subject', 150);
            $table->longText('body');
            $table->string('month_date', 50)->unique();
            $table->boolean('force_send')->default(false);
            $table->dateTime('last_synced_at')->nullable();
            $table->json('results')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_crons');
    }
};
