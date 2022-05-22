<?php

use App\Models\AdminUser;
use App\Models\ExternalOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AdminUser::class);
            $table->foreignIdFor(ExternalOrder::class);
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
        Schema::dropIfExists('officer_orders');
    }
}
