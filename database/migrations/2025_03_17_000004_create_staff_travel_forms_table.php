<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTravelFormsTable extends Migration
{
    public function up()
    {
        Schema::create('staff_travel_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name_of_staff');
            $table->string('staff_designation');
            $table->string('staff_gender');
            $table->string('name_of_division');
            $table->string('purpose_of_travel');
            $table->string('source_of_fund');
            $table->date('date_of_departure');
            $table->string('number_of_absent_in_days');
            $table->date('return_date');
            $table->string('travel_destination')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
