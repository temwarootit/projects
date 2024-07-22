<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('local_business_registration_name')->nullable();
            $table->string('type_of_company');
            $table->date('date_of_establishment');
            $table->string('registered_address');
            $table->string('business_activities');
            $table->string('foreign_investment_license')->nullable();
            $table->string('are_you_renewing_your_sea_cucumber_export_license');
            $table->string('have_you_previously_exported_sea_cucumber');
            $table->string('how_long_have_been_involved_in_this_business');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
