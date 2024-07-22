<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('compliance_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aware_of_international_law')->nullable();
            $table->string('fisheries_related_offences')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
