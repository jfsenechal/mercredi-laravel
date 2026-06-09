<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('animateur')) {
            Schema::table('animateur', function (Blueprint $table): void {
                $table->rename('instructors');
            });
            Schema::table('instructors', function (Blueprint $table): void {
                $table->renameColumn('nom', 'last_name');
                $table->renameColumn('prenom', 'first_name');
                $table->renameColumn('rue', 'street');
                $table->renameColumn('code_postal', 'postal_code');
                $table->renameColumn('localite', 'city');
                $table->renameColumn('remarque', 'remark');
                $table->renameColumn('sexe', 'gender');
                $table->renameColumn('telephone', 'phone');
                $table->renameColumn('telephone_bureau', 'office_phone');
                $table->renameColumn('gsm', 'mobile');
                $table->renameColumn('archived', 'is_archived');
                $table->renameColumn('user_add', 'created_by');
            });
        } else {
            Schema::create('instructors', function (Blueprint $table) {
                $table->id();
                $table->string('last_name', 150);
                $table->string('first_name', 50)->nullable();
                $table->string('street', 200)->nullable();
                $table->string('postal_code', 20)->nullable();
                $table->string('city', 200)->nullable();
                $table->string('email', 150)->nullable();
                $table->longText('remark')->nullable();
                $table->string('gender', 150)->nullable();
                $table->string('phone', 150)->nullable();
                $table->string('office_phone', 150)->nullable();
                $table->string('mobile', 150)->nullable();
                $table->boolean('is_archived')->default(false);
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
