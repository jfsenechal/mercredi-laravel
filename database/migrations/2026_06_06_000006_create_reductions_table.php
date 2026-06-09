<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('reduction')) {
            Schema::table('reduction', function (Blueprint $table): void {
                $table->rename('reductions');
            });
            Schema::table('reductions', function (Blueprint $table): void {
                $table->renameColumn('pourcentage', 'percentage');
                $table->renameColumn('nom', 'name');
                $table->renameColumn('remarque', 'remark');
                $table->renameColumn('is_forfait', 'is_flat_rate');
                $table->timestamps();
            });
        } else {
            Schema::create('reductions', function (Blueprint $table) {
                $table->id();
                $table->decimal('percentage', 5, 2)->nullable();
                $table->decimal('amount', 10, 2)->nullable();
                $table->string('name', 150);
                $table->longText('remark')->nullable();
                $table->boolean('is_flat_rate')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('reductions');
    }
};
