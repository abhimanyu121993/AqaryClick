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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('contract_code')->nullable();
            $table->string('tenant_name')->nullable();
            $table->string('document_type')->nullable();
            $table->string('qid_document')->nullable();
            $table->string('cr_document')->nullable();
            $table->string('passport_document')->nullable();
            $table->string('tenant_mobile')->nullable();
            $table->string('tenant_nationality')->nullable();
            $table->string('sponsor_nationality')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_mobile')->nullable();
            $table->string('lessor')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('authorized_person')->nullable();
            $table->string('lessor_sign')->nullable();
            $table->string('release_date')->nullable();
            $table->string('lease_start_date')->nullable();
            $table->string('lease_end_date')->nullable();
            $table->string('lease_period_month')->nullable();
            $table->string('lease_period_day')->nullable();
            $table->string('is_grace')->nullable();
            $table->string('grace_start_date')->nullable();
            $table->string('grace_end_date')->nullable();
            $table->string('grace_period_month')->nullable();
            $table->string('grace_period_day')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('attestation_no')->nullable();
            $table->string('attestation_status')->nullable();
            $table->string('attestation_expiry')->nullable();
            $table->string('contract_status')->nullable();
            $table->string('rent_amount')->nullable();
            $table->string('user_amt')->nullable();
            $table->string('tenant_sign')->nullable();
            $table->string('total_invoice')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('guarantees')->nullable();
            $table->string('guarantees_payment_method')->nullable();
            $table->text('remark')->nullable();
            $table->string('status')->default(0);
            $table->string('discount')->default(0);
            $table->string('increament_term')->default(0);
            $table->string('expire')->default(0);
            $table->string('overdue')->default(0);
            $table->boolean('overdue_status')->default(0);
            $table->string('currency')->default('QAR');
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
