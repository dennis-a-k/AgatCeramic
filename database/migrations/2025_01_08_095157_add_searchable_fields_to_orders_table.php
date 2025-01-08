<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Добавляем поля для поиска
            $table->string('searchable_email')->nullable()->index();
            $table->string('searchable_phone')->nullable()->index();
            $table->string('searchable_name')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'searchable_email',
                'searchable_phone',
                'searchable_name'
            ]);
        });
    }
};
