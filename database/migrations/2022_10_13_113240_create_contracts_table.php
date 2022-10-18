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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_type')->nullable();
            $table->string('document_type')->nullable();
            $table->string('sponsor_nationality')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_mobile')->nullable();
            $table->string('tenant_mobile')->nullable();
            $table->string('lessor')->nullable();
            $table->string('lessor_sign')->nullable();
            $table->string('release_date')->nullable();
            $table->string('lease_start_date')->nullable();
            $table->string('lease_end_date')->nullable();
            $table->string('lease_period_month')->nullable();
            $table->string('lease_period_day')->nullable();
            $table->string('grace_start_date')->nullable();
            $table->string('grace_end_date')->nullable();
            $table->string('grace_period_month')->nullable();
            $table->string('grace_period_day')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('attestation_no')->nullable();
            $table->string('attestation_expiry')->nullable();
            $table->string('contract_status')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
