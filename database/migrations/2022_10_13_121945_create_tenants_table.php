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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('file_no')->nullable();
            $table->string('tenant_code')->nullable();
            $table->string('tenant_english_name')->nullable();
            $table->string('tenant_arabic_name')->nullable();
            $table->string('tenant_type')->nullable();
            $table->string('tenant_document')->nullable();
            $table->string('qid_document')->nullable();
            $table->string('cr_document')->nullable();
            $table->string('passport')->nullable();
            $table->string('tenant_primary_mobile')->nullable();
            $table->string('tenant_secondary_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('authorized_person')->nullable();
            $table->string('authorized_person_qid')->nullable();
            $table->string('post_office')->nullable();
            $table->string('post_office')->nullable();
            $table->string('tenant_nationality')->nullable();
            $table->longText('unit_address')->nullable();
            $table->string('account_no')->nullable();
            $table->string('unit_no')->nullable();
            $table->string('building_name')->nullable();
            $table->string('status')->nullable();
            $table->string('total_unit')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('rental_period')->nullable();
            $table->string('rental_time')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_receipt')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->string('sponsor_oid')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('sponsor_nationality')->nullable();
            $table->json('file_name')->default(json_encode([]));
            $table->json('attachment_file')->default(json_encode([]));
            $table->string('attachment_remark')->nullable();
            $table->string('established_card_no')->nullable();
            $table->string('government_housing_no')->nullable();
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
        Schema::dropIfExists('tenants');
    }
};
