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

            $table->string('clause_one_english');
            $table->string('clause_one_arabic');
            $table->string('clause_two_english');
            $table->string('clause_two_arabic');
            $table->string('clause_three_english');
            $table->string('clause_three_arabic');
            $table->string('clause_four_english');
            $table->string('clause_four_arabic');
            $table->string('clause_five_english');
            $table->string('clause_five_arabic');
            $table->string('clause_six_english');
            $table->string('clause_six_arabic');
            $table->string('clause_seven_english');
            $table->string('clause_seven_arabic');
            $table->string('clause_eight_english');
            $table->string('clause_eight_arabic');
            $table->string('clause_nine_english');
            $table->string('clause_nine_arabic');
            $table->string('clause_ten_english');
            $table->string('clause_ten_arabic');
            $table->string('clause_eleven_english');
            $table->string('clause_eleven_arabic');
            $table->string('clause_twelve_english');
            $table->string('clause_twelve_arabic');
            $table->string('clause_therteen_english');
            $table->string('clause_therteen_arabic');
            $table->string('clause_fourteen_english');
            $table->string('clause_fourteen_arabic');
            $table->string('clause_fiftyteen_english');
            $table->string('clause_fiftyteen_arabic');
            $table->string('clause_sixteen_english');
            $table->string('clause_sixteen_arabic');
            $table->string('clause_seventeen_english');
            $table->string('clause_seventeen_arabic');
            $table->string('clause_eighteen_english');
            $table->string('clause_eighteen_arabic');
            $table->string('clause_nineteen_english');
            $table->string('clause_nineteen_arabic');

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
