<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->foreignId('next_year_id')->nullable()->constrained('school_years')->nullOnDelete();
            $table->foreignId('school_group_id')->nullable()->constrained('school_groups')->nullOnDelete();
            $table->integer('position')->default(0);
            $table->string('name', 150);
            $table->longText('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};
