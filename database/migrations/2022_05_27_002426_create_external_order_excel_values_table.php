<?php

use App\Models\ExternalAlkesOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalOrderExcelValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_order_excel_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExternalAlkesOrder::class)->constrained();
            $table->string('cell');
            $table->string('value');
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
        Schema::dropIfExists('external_order_excel_values');
    }
}
