<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('building_code')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('lessor_name')->nullable();
            $table->string('person_incharge')->nullable();
            $table->string('total_unit')->nullable();
            $table->string('building_type')->nullable();
            $table->string('construction_date')->nullable();
            $table->string('person_name')->nullable();
            $table->string('person_mobile')->nullable();
            $table->string('building_receive_date')->nullable();
            $table->boolean('building_status')->default(1);
            $table->boolean('status')->default(0);
            $table->string('space')->nullable()->comment('Area in Sq.Meter');
            $table->string('location')->nullable()->comment('Google map link');
            $table->string('contract_no')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('pincode')->nullable();
            $table->string('building_pic')->nullable();
            $table->string('file')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('buildings');
    }
};
