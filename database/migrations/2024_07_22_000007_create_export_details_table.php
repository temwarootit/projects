<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('export_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_island_to_harvest_for_sea_cucumber')->nullable();
            $table->string('island_council_concerned')->nullable();
            $table->string('are_you_going_to_export_sea_cucumber');
            $table->string('target_species_exported');
            $table->string('quota_requested_to_be_exported');
            $table->string('fishing_method');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
