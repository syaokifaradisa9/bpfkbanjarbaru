<?php

use App\Models\Alkes;
use App\Models\InternalOrder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->foreignIdFor(Alkes::class)->constrained();
            $table->foreignIdFor(InternalOrder::class)->constrained();
            
            // Keterangan Oleh Fasyankes
            $table->unsignedBigInteger('client_description_id')->index()->default(1);
            $table->foreign('client_description_id')->references('id')->on('alkes_order_descriptions');

            // Keterangan Oleh Petugas
            $table->unsignedBigInteger('admin_description_id')->index()->default(1);
            $table->foreign('admin_description_id')->references('id')->on('alkes_order_descriptions');

            // Informasi Alkes
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->enum('function', ['Baik', 'Tidak Baik'])->default('Baik');
            $table->string('series_number')->nullable();
            
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
