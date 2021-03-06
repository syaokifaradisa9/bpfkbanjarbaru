<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('letter_name');
            $table->integer('letter_number');
            $table->integer('out_letter_number')->nullable();
            $table->timestamp('letter_date');
            $table->enum('status', [
                'DIBATALKAN',
                'TERKIRIM', 
                'DITERIMA',
                'MENUNGGU PERSETUJUAN', 
                'DISETUJUI', 
                'DALAM PERJALANAN', 
                'PENGERJAAN', 
                'MENUNGGU PEMBAYARAN', 
                'SELESAI'
            ])->default('TERKIRIM');

            $table->integer('pp_hour')->nullable();
            $table->integer('pp_minute')->nullable();
            $table->integer('total_officer')->nullable();

            $table->string('approval_letter_name')->nullable();

            $table->timestamp('finishing_date')->nullable();

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
        Schema::dropIfExists('external_orders');
    }
}
