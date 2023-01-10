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
        Schema::create('cheque_statements', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id');
            $table->string('unit_no');
            $table->string('cheque_no');
            $table->string('amount');
            $table->string('cheque_start_date');
            $table->string('cheque_expaire_date');
            $table->string('cheque_status');
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
        Schema::dropIfExists('cheque_statements');
    }
};
