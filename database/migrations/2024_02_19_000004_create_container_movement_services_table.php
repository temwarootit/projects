<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerMovementServicesTable extends Migration
{
    public function up()
    {
        Schema::create('container_movement_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('container_no');
            $table->string('type');
            $table->string('service');
            $table->string('lease_lessor');
            $table->string('vessel')->nullable();
            $table->string('mov_code')->nullable();
            $table->string('consignee');
            $table->date('dchf')->nullable();
            $table->date('devan')->nullable();
            $table->date('sntc')->nullable();
            $table->date('snts')->nullable();
            $table->date('rcve')->nullable();
            $table->date('rcvf')->nullable();
            $table->date('lode')->nullable();
            $table->date('lodf')->nullable();
            $table->date('sntb')->nullable();
            $table->string('location')->nullable();
            $table->string('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
