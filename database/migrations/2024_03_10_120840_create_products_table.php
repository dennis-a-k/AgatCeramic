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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('title');
            $table->decimal('price', 5, 2)->unsigned()->default(0.00);
            $table->string('product_code')->nullable();
            $table->foreignId('category_id')->nullable()->index()->constrained('categories')->onDelete('cascade');
            $table->foreignId('size_id')->nullable()->index()->constrained('sizes')->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->index()->constrained('colors')->onDelete('cascade');
            $table->foreignId('pattern_id')->nullable()->index()->constrained('patterns')->onDelete('cascade');
            $table->foreignId('texture_id')->nullable()->index()->constrained('textures')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->index()->constrained('brands')->onDelete('cascade');
            $table->foreignId('collection_id')->nullable()->index()->constrained('collections')->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->index()->constrained('countries')->onDelete('cascade');
            $table->foreignId('image_id')->nullable()->index()->constrained('images')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
