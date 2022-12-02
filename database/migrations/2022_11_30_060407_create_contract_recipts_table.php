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
        Schema::create('contract_recipts', function (Blueprint $table) {
            $table->id();

            $table->longText('clause_one_english')->nullable();
            $table->longText('clause_one_arabic')->nullable();
            $table->longText('clause_two_english')->nullable();
            $table->longText('clause_two_arabic')->nullable();
            $table->longText('clause_three_english')->nullable();
            $table->longText('clause_three_arabic')->nullable();
            $table->longText('clause_four_english')->nullable();
            $table->longText('clause_four_arabic')->nullable();
            $table->longText('clause_five_english')->nullable();
            $table->longText('clause_five_arabic')->nullable();
            $table->longText('clause_six_english')->nullable();
            $table->longText('clause_six_arabic')->nullable();
            $table->longText('clause_seven_english')->nullable();
            $table->longText('clause_seven_arabic')->nullable();
            $table->longText('clause_eight_english')->nullable();
            $table->longText('clause_eight_arabic')->nullable();
            $table->longText('clause_nine_english')->nullable();
            $table->longText('clause_nine_arabic')->nullable();
            $table->longText('clause_ten_english')->nullable();
            $table->longText('clause_ten_arabic')->nullable();
            $table->longText('clause_eleven_english')->nullable();
            $table->longText('clause_eleven_arabic')->nullable();
            $table->longText('clause_twelve_english')->nullable();
            $table->longText('clause_twelve_arabic')->nullable();
            $table->longText('clause_therteen_english')->nullable();
            $table->longText('clause_therteen_arabic')->nullable();
            $table->longText('clause_fourteen_english')->nullable();
            $table->longText('clause_fourteen_arabic')->nullable();
            $table->longText('clause_fiftyteen_english')->nullable();
            $table->longText('clause_fiftyteen_arabic')->nullable();
            $table->longText('clause_sixteen_english')->nullable();
            $table->longText('clause_sixteen_arabic')->nullable();
            $table->longText('clause_seventeen_english')->nullable();
            $table->longText('clause_seventeen_arabic')->nullable();
            $table->longText('clause_eighteen_english')->nullable();
            $table->longText('clause_eighteen_arabic')->nullable();
            $table->longText('clause_nineteen_english')->nullable();
            $table->longText('clause_nineteen_arabic')->nullable();

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
        Schema::dropIfExists('contract_recipts');
    }
};
