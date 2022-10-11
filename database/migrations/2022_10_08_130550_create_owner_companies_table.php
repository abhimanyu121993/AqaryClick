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
        Schema::create('owner_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('company_activity')->nullable();
            $table->string('authorised_manager')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('reg_expire_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_no')->nullable();
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
        Schema::dropIfExists('owner_companies');
    }
};
