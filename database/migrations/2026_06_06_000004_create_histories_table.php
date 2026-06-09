<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('history')) {
            Schema::table('history', function (Blueprint $table): void {
                $table->rename('histories');
            });
            Schema::table('histories', function (Blueprint $table): void {
                $table->timestamp('created_at')->nullable()->change();
                $table->timestamp('updated_at')->nullable();
            });
        } else {
            Schema::create('histories', function (Blueprint $table) {
                $table->id();
                $table->string('subject', 50);
                $table->integer('count')->default(0);
                $table->longText('message')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
