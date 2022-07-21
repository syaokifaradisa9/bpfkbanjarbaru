<?php

use App\Models\FasyankesCategory;
use App\Models\FasyankesClass;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fasyankes_name');
            $table->enum('type', ['Negeri', 'Swasta']);
            $table->foreignIdFor(FasyankesCategory::class)->constrained();
            $table->foreignIdFor(FasyankesClass::class)->constrained();
            $table->string('province');
            $table->string('city');
            $table->string('phone');
            $table->text('address');
            $table->string('pic');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
