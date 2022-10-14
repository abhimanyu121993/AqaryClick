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
            $table->string('tenant_nationality')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_mobile')->nullable();
            $table->string('lessor')->nullable();
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
