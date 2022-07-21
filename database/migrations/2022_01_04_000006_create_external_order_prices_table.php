<?php

use App\Models\ExternalOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalOrderPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_order_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExternalOrder::class)->constrained();
            $table->string('cost_breakdown');
            $table->double('price');
            $table->string('description');
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
        Schema::dropIfExists('external_order_prices');
    }
}
