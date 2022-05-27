<?php

use App\Models\InstrumentGroup;
use App\Models\MeasuringInstrument;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumentGroupRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_group_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MeasuringInstrument::class)->constrained();
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
        Schema::dropIfExists('instrument_group_relations');
    }
}
