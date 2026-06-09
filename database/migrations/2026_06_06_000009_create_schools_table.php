<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('ecole')) {
            Schema::table('ecole', function (Blueprint $table): void {
                $table->rename('schools');
            });
            Schema::table('schools', function (Blueprint $table): void {
                $table->renameColumn('abreviation', 'abbreviation');
                $table->renameColumn('nom', 'name');
                $table->renameColumn('rue', 'street');
                $table->renameColumn('code_postal', 'postal_code');
                $table->renameColumn('localite', 'city');
                $table->renameColumn('telephone', 'phone');
                $table->renameColumn('telephone_bureau', 'office_phone');
                $table->renameColumn('gsm', 'mobile');
                $table->renameColumn('remarque', 'remark');
                $table->timestamps();
            });
        } else {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
