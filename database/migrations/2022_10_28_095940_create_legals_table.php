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
        Schema::create('legals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->string('tenant_name')->nullable();
            $table->string('tenant_mobile')->nullable();
            $table->string('unit_ref')->nullable();
            $table->string('status')->nullable();
            $table->json('file')->default(json_encode([]));
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('legals');
    }
};
