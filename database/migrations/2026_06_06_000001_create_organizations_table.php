<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('initials', 20)->nullable();
            $table->string('email');
            $table->string('name', 150);
            $table->string('street', 200)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('website', 150)->nullable();
            $table->string('phone', 150)->nullable();
            $table->string('office_phone', 150)->nullable();
            $table->string('mobile', 150)->nullable();
            $table->longText('remark')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('account_number', 200)->nullable();
            $table->string('manager_last_name', 150)->nullable();
            $table->string('manager_first_name', 150)->nullable();
            $table->string('manager_role', 150)->nullable();
            $table->string('email_from', 150)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
