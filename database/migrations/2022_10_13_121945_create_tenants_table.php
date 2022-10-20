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

            $table->string('tenant_code')->nullable();
            $table->string('tenant_english_name')->nullable();
            $table->string('tenant_arabic_name')->nullable();
            $table->string('tenant_document')->nullable();
            $table->string('qid_document')->nullable();
            $table->string('cr_document')->nullable();
            $table->string('passport')->nullable();
            $table->string('tenant_nationality')->nullable();
            $table->string('tenant_primary_mobile')->nullable();
            $table->string('tenant_secondary_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('post_office')->nullable();
            $table->string('address')->nullable();
            $table->string('tenant_type')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('unit_address')->nullable();
            $table->string('rental_period')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_receipt')->nullable();
            $table->json('attachment_file')->default(json_encode([]));
            // $table->array('attachment_file')->nullable();
            $table->string('attachment_remark')->nullable();

            // $table->string('tenant_status')->nullable();
            // $table->string('document_name')->nullable();
            // $table->string('sponsor_name')->nullable();
            // $table->string('sponsor_email')->nullable();
            // $table->string('sponsor_oid')->nullable();
            // $table->string('sponsor_phone')->nullable();
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
