<?php

use App\Models\Alkes;
use App\Models\InstrumentGroup;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumentAlkesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_alkes_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Alkes::class)->constrained();
            $table->foreignIdFor(InstrumentGroup::class)->constrained();
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
        Schema::dropIfExists('instrument_alkes_groups');
    }
}
