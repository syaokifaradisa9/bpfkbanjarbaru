<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('covering_letter_path');
            $table->timestamp('delivery_date_estimation');
            $table->string('delivery_option');
            $table->string('delivery_travel_name')->nullable();
            $table->timestamp('arrival_date_estimation');
            $table->enum('status', ['TERKIRIM', 'DITERIMA','DITOLAK', 'DIPROSES', 'SELESAI'])->default('TERKIRIM');
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
        Schema::dropIfExists('internal_orders');
    }
}
