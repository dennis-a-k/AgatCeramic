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
        Schema::table('collections', function (Blueprint $table) {
            $table->string('slug')->after('title');
        });

        Schema::table('colors', function (Blueprint $table) {
            $table->string('slug')->after('title');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->string('slug')->after('name');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->after('title');
        });

        Schema::table('textures', function (Blueprint $table) {
            $table->string('slug')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('colors', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });

        Schema::table('textures', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
