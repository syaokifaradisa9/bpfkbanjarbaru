<?php

use App\Models\AdminUser;
use App\Models\InternalAlkesOrder;
use App\Models\InternalOrder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalOfficerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_officer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AdminUser::class)->constrained();
            $table->foreignIdFor(InternalAlkesOrder::class)->constrained();
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
        Schema::dropIfExists('internal_officer_orders');
    }
}
