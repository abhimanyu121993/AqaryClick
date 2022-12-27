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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('building_id')->nullable();
            $table->string('unit_no')->nullable();
            $table->string('unit_code')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('unit_status')->nullable();
            $table->string('unit_floor')->nullable();
            $table->string('unit_size')->nullable();
            $table->string('unit_feature')->nullable();
            $table->string('electric_no')->nullable();
            $table->string('water_no')->nullable();
            $table->string('intial_rent')->nullable();
            $table->longText('actual_rent')->nullable();
            $table->string('unit_desc')->nullable();
            $table->string('unit_ref')->nullable();
            $table->string('revenue')->nullable();
            $table->string('reason_vacant')->nullable();
            $table->timestamp('vacant_date')->nullable();            
            $table->json('attachment')->default(json_encode([]));
            $table->string('parking_status')->nullable();
            $table->string('parking_no')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('units');
    }
};
