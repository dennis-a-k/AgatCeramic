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
            $table->dropColumn('k/s');
            $table->dropColumn('r/s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_data', function (Blueprint $table) {
            $table->string('k/s')->after('bik')->nullable();
            $table->string('r/s')->after('k/s')->nullable();
        });
    }
};
