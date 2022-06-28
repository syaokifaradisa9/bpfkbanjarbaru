<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('letter_name');

            // Estimasi Pengantaran dan Sampai
            $table->timestamp('delivery_date_estimation');
            $table->timestamp('arrival_date_estimation');

            // Pihak Pengantar Alat
            $table->string('delivery_option');
            $table->string('delivery_travel_name')->nullable();

            // Contact Person Pengantar Alat
            $table->string('contact_person_name');
            $table->string('contact_person_phone');

            // Keterangan Oleh Admin
            $table->string('description')->nullable();

            // Penerimaan Alat
            $table->boolean('review_request')->default(true);
            $table->boolean('calibration_ability')->default(true);
            $table->boolean('officer_readiness')->default(true);
            $table->boolean('workload')->default(true);
            $table->boolean('equipment_condition')->default(true);
            $table->boolean('calibration_method_compatibility')->default(true);
            $table->boolean('accommodation_and_environment')->default(true);
            $table->string('alkes_checker')->nullable();

            // Penyerahan Alat
            $table->string('contact_person_receiver_name')->nullable();;
            $table->string('contact_person_receiver_phone')->nullable();
            $table->boolean('alkes_accordingly')->default(true);
            $table->boolean('certificate_handedover')->default(true);
            $table->boolean('cancel_test')->default(false);
            $table->boolean('alkes_checked')->default(true);

            $table->enum('status', [
                'MENUNGGU', 
                'ORDER DITERIMA',
                'DITOLAK', 
                'ALAT DITERIMA', 
                'PROSES PENGERJAAN', 
                'MENUNGGU PEMBAYARAN',
                'PEMBAYARAN LUNAS',
                'ALAT DAN SERTIFIKAT TELAH DISERAHKAN'
                ])->default('MENUNGGU');

            $table->timestamp('finishing_date')->nullable();
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
        Schema::dropIfExists('internal_orders');
    }
}
