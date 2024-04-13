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
            $table->dropForeign(['image_id']); // Удаление внешнего ключа
            $table->dropColumn('image_id'); // Удаление столбца
            // Изменение колонки 'price' для увеличения точности до 10 знаков вместо 5
            $table->decimal('price', 10, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('image_id')->after('country_id')->nullable()->index()->constrained('images')->onDelete('cascade');
            $table->decimal('price', 5, 2)->change();
        });
    }
};
