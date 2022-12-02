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
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_name')->nullable();
            $table->string('cr_no')->nullable();
            $table->longText('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('post_box')->nullable();
            $table->string('authorized_person')->nullable();
            $table->string('logo')->nullable();
            $table->string('activity')->nullable();
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
        Schema::dropIfExists('business_details');
    }
};
