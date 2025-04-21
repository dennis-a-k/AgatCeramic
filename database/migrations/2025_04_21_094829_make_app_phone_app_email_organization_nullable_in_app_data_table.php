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
        Schema::table('app_data', function (Blueprint $table) {
            $table->string('app_phone')->nullable()->change();
            $table->string('app_email')->nullable()->change();
            $table->string('organization')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_data', function (Blueprint $table) {
            $table->string('app_phone')->nullable(false)->change();
            $table->string('app_email')->nullable(false)->change();
            $table->string('organization')->nullable(false)->change();
        });
    }
};
