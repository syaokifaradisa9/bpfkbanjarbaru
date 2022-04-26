<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalAlkesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_alkes_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alkes_id')->constrained();
            $table->foreignId('internal_order_id')->constrained();
            $table->foreignId('alkes_order_description_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internal_alkes_orders');
    }
}
