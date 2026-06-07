<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation', 20)->nullable();
            $table->string('name', 150);
            $table->string('street', 200)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('phone', 150)->nullable();
            $table->string('office_phone', 150)->nullable();
            $table->string('mobile', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->longText('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
