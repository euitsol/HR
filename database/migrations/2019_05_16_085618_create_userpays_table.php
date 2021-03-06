<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserpaysTable extends Migration
{

    public function up()
    {
        Schema::create('userpays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->float('pay');
//            $table->float('tax')->nullable();
            $table->float('compensation');
            $table->float('benefit');
            $table->string('benefit_detail');
            $table->float('family_support');
            $table->string('family_support_detail');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('userpays');
    }
}
