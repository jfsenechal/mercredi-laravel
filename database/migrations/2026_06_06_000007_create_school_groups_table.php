<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_groups', function (Blueprint $table) {
            $table->id();
            $table->decimal('min_age', 4, 1)->nullable();
            $table->decimal('max_age', 4, 1)->nullable();
            $table->string('name', 150);
            $table->longText('remark')->nullable();
            $table->smallInteger('position')->default(0);
            $table->string('short_name', 150)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_groups');
    }
};
