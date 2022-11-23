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
        Schema::create('electricities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('building_name')->nullable();
            $table->string('unit_no')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('electric_under')->nullable();
            $table->string('name')->nullable();
            $table->string('qid_no')->nullable();
            $table->string('reg_mobile')->nullable();
            $table->string('electric_no')->nullable();
            $table->string('water_no')->nullable();
            $table->string('bill_amt')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('last_payment')->default('No Records');
            $table->json('file')->default(json_encode([]));
            $table->text('auth_paid')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('electricities');
    }
};
