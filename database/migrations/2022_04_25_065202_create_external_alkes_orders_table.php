<?php

use App\Models\AdminUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalAlkesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_alkes_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alkes_id')->constrained();
            $table->foreignId('external_order_id')->constrained();
            $table->foreignId('alkes_order_description_id')->constrained();
            $table->string('officer')->nullable();
            $table->boolean('is_success')->nullable();
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
        Schema::dropIfExists('external_alkes_orders');
    }
}
