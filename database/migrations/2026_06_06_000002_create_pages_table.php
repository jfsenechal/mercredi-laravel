<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('page')) {
            Schema::table('page', function (Blueprint $table): void {
                $table->rename('pages');
            });
            Schema::table('pages', function (Blueprint $table): void {
                $table->renameColumn('slug_system', 'system_slug');
                $table->renameColumn('menu', 'in_menu');
                $table->renameColumn('nom', 'title');
                $table->timestamps();
            });
        } else {
            Schema::create('pages', function (Blueprint $table) {
                $table->id();
                $table->string('system_slug')->nullable();
                $table->smallInteger('position')->nullable();
                $table->boolean('in_menu')->default(false);
                $table->string('title', 150);
                $table->longText('content')->nullable();
                $table->string('slug')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
