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
        Schema::create('app_data', function (Blueprint $table) {
            $table->id();
            $table->string('app_phone');
            $table->string('app_email');
            $table->string('organization');
            $table->string('inn')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('okato')->nullable();
            $table->string('okpo')->nullable();
            $table->string('bank')->nullable();
            $table->string('bik')->nullable();
            $table->string('k/s')->nullable();
            $table->string('r/s')->nullable();
            $table->string('adress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_data');
    }
};
