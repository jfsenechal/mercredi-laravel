<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_year_id')->nullable()->constrained('school_years')->nullOnDelete();
            $table->foreignId('school_group_id')->nullable()->constrained('school_groups')->nullOnDelete();
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete();
            $table->boolean('is_photo_authorized')->default(false);
            $table->string('last_name', 150);
            $table->string('first_name', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 150)->nullable();
            $table->longText('remark')->nullable();
            $table->smallInteger('position')->default(0);
            $table->string('photo_path')->nullable();
            $table->string('mime_type')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_school_reception')->default(false);
            $table->string('national_register_number', 150)->nullable();
            $table->string('weight', 150)->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
