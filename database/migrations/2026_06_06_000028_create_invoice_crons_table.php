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
        if (Schema::hasTable('facture_cron')) {
            Schema::table('facture_cron', function (Blueprint $table): void {
                $table->rename('invoice_crons');
            });
            Schema::table('invoice_crons', function (Blueprint $table): void {
                $table->renameColumn('done', 'is_done');
                $table->renameColumn('from_adresse', 'from_address');
                $table->renameColumn('date_last_sync', 'last_synced_at');
                $table->renameColumn('user_add', 'created_by');
            });
        } else {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_crons');
    }
};
