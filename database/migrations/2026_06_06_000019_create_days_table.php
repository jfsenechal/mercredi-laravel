<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('jour')) {
            Schema::table('jour', function (Blueprint $table): void {
                $table->rename('days');
            });
            Schema::table('days', function (Blueprint $table): void {
                $table->renameColumn('plaine_id', 'camp_id');
                $table->renameColumn('date_jour', 'date');
                $table->renameColumn('prix1', 'price1');
                $table->renameColumn('prix2', 'price2');
                $table->renameColumn('prix3', 'price3');
                $table->renameColumn('remarque', 'remark');
                $table->renameColumn('archived', 'is_archived');
                $table->renameColumn('pedagogique', 'is_pedagogical');
                $table->renameColumn('forfait', 'flat_rate');
                $table->dropColumn('id_old');
            });
        } else {
            Schema::create('days', function (Blueprint $table) {
                $table->id();
                $table->foreignId('camp_id')->nullable()->constrained('camps')->nullOnDelete();
                $table->date('date');
                $table->decimal('price1', 10, 2)->default(0);
                $table->decimal('price2', 10, 2)->default(0);
                $table->decimal('price3', 10, 2)->default(0);
                $table->string('color', 20)->nullable();
                $table->longText('remark')->nullable();
                $table->boolean('is_archived')->default(false);
                $table->boolean('is_pedagogical')->default(false);
                $table->decimal('flat_rate', 10, 2)->default(0);
                $table->timestamps();

                $table->unique(['date', 'is_pedagogical', 'camp_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('days');
    }
};
