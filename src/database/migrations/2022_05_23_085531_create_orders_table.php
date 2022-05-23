<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique()->comment('Номер заказа');
            $table->string('fio')->comment('ФИО');
            $table->date('date')->comment('Дата заказа');
            $table->double('total_sum')->comment('Итоговая стоимость заказа (РУБ)');
            $table->text('delivery_address')->comment('Адрес доставки');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
