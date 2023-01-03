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
        Schema::create('building_assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_id');
            $table->enum('type', ['img', 'plan','video']);
            $table->string('title')->nullable();
            $table->string('detail');
            $table->text('content');
            $table->timestamps();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_assets');
    }
};
