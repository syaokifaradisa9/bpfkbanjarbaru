<?php

use App\Models\AdminUser;
use App\Models\ExternalOrder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternalOfficerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_officer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AdminUser::class)->constrained();
            $table->foreignIdFor(ExternalOrder::class)->constrained();
            $table->enum('role', ['Ketua','Anggota']);
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
        Schema::dropIfExists('external_officer_orders');
    }
}
