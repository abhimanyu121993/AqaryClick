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

            $table->string('tenant_name')->nullable();
            $table->string('file_number')->nullable();
            $table->string('tenant_code')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('post_office')->nullable();
            $table->string('address')->nullable();
            $table->string('tenant_status')->nullable();
            $table->string('document_name')->nullable();
            $table->string('total_unit')->nullable();
            $table->string('customer_nationality')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->string('sponsor_oid')->nullable();
            $table->string('attachment_file')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('attachment_remark')->nullable();
            $table->string('tenant_document')->nullable();
            $table->string('oid_document')->nullable();
            $table->string('cr_document')->nullable();
            $table->string('passcode')->nullable();
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
