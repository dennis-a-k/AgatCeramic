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
            $table->string('telegram')->nullable()->after('app_email');
            $table->string('whatsapp')->nullable()->after('telegram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_data', function (Blueprint $table) {
            $table->dropColumn(['telegram', 'whatsapp']);
        });
    }
};
