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
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('currency')->nullable();            
            $table->string('deposite_date')->nullable();
            $table->string('user_amt')->nullable();
            $table->string('qar_amt')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('cheque_status')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('cheques');
    }
};
