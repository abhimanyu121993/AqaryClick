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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->nullable();
            $table->string('contract_id')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('due_date')->nullable();
            $table->string('invoice_period_start')->nullable();
            $table->string('invoice_period_end')->nullable();
            $table->string('amt_paid')->nullable();
            $table->string('due_amt')->default(0);
            $table->string('payment_method')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('overdue_period')->nullable();
            $table->json('attachment')->default(json_encode([]));
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
        Schema::dropIfExists('invoices');
    }
};
