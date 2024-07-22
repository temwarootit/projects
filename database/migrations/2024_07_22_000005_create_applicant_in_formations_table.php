<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantInFormationsTable extends Migration
{
    public function up()
    {
        Schema::create('applicant_in_formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name_of_applicant');
            $table->string('applicant_citizenship');
            $table->string('email_address')->nullable();
            $table->string('phone_or_mobile_nu')->nullable();
            $table->string('work_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
