<?php

use App\Models\InternalAlkesOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalOrderExcelValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_order_excel_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(InternalAlkesOrder::class)->constrained();
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
        Schema::dropIfExists('internal_order_excel_values');
    }
}
