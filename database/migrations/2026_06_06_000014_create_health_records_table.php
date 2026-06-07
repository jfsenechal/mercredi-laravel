<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->unique()->constrained('children')->cascadeOnDelete();
            $table->longText('emergency_contact');
            $table->string('doctor_name', 200);
            $table->string('doctor_phone', 200);
            $table->longText('companions')->nullable();
            $table->longText('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};
