<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Camps (legacy `plaine`). The original dump referenced this table without
 * defining it; a minimal structure is created here to satisfy invoice and day
 * relationships.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->longText('remark')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('camps');
    }
};
