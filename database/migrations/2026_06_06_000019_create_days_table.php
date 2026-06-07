<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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

    public function down(): void
    {
        Schema::dropIfExists('days');
    }
};
