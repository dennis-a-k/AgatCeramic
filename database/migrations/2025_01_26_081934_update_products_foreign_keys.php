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
        Schema::table('products', function (Blueprint $table) {
            // Удаляем существующие внешние ключи с каскадным удалением
            $table->dropForeign(['category_id']);
            $table->dropForeign(['size_id']);
            $table->dropForeign(['color_id']);
            $table->dropForeign(['pattern_id']);
            $table->dropForeign(['texture_id']);
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['collection_id']);
            $table->dropForeign(['country_id']);

            // Пересоздаем внешние ключи с onDelete('set null')
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');

            $table->foreign('size_id')
                  ->references('id')
                  ->on('sizes')
                  ->onDelete('set null');

            $table->foreign('color_id')
                  ->references('id')
                  ->on('colors')
                  ->onDelete('set null');

            $table->foreign('pattern_id')
                  ->references('id')
                  ->on('patterns')
                  ->onDelete('set null');

            $table->foreign('texture_id')
                  ->references('id')
                  ->on('textures')
                  ->onDelete('set null');

            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('set null');

            $table->foreign('collection_id')
                  ->references('id')
                  ->on('collections')
                  ->onDelete('set null');

            $table->foreign('country_id')
                  ->references('id')
                  ->on('countries')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Откат изменений
            $table->dropForeign(['category_id']);
            $table->dropForeign(['size_id']);
            $table->dropForeign(['color_id']);
            $table->dropForeign(['pattern_id']);
            $table->dropForeign(['texture_id']);
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['collection_id']);
            $table->dropForeign(['country_id']);

            // Восстановление прежних внешних ключей с каскадным удалением
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');

            $table->foreign('size_id')
                  ->references('id')
                  ->on('sizes')
                  ->onDelete('cascade');

            $table->foreign('color_id')
                  ->references('id')
                  ->on('colors')
                  ->onDelete('cascade');

            $table->foreign('pattern_id')
                  ->references('id')
                  ->on('patterns')
                  ->onDelete('cascade');

            $table->foreign('texture_id')
                  ->references('id')
                  ->on('textures')
                  ->onDelete('cascade');

            $table->foreign('brand_id')
                  ->references('id')
                  ->on('brands')
                  ->onDelete('cascade');

            $table->foreign('collection_id')
                  ->references('id')
                  ->on('collections')
                  ->onDelete('cascade');

            $table->foreign('country_id')
                  ->references('id')
                  ->on('countries')
                  ->onDelete('cascade');
        });
    }
};
