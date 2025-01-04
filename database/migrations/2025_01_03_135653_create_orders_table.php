<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // номер заказа
            $table->string('customer_name'); // имя клиента
            $table->string('customer_email'); // email клиента
            $table->string('customer_phone'); // телефон клиента
            $table->text('shipping_address'); // адрес доставки
            $table->text('comment')->nullable(); // комментарий к заказу
            $table->decimal('total_amount', 10, 2); // общая сумма
            $table->string('status')->default('pending'); // статус заказа
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained();
            $table->string('product_title'); // название товара
            $table->decimal('price', 10, 2); // цена
            $table->integer('quantity'); // количество
            $table->decimal('subtotal', 10, 2); // подытог
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
