<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_number')->nullable();
            $table->string('reg_authority')->nullable();
            $table->date('register_date')->nullable();
            $table->date('unregister_date')->nullable();
            $table->date('fns_date')->nullable();
            $table->bigInteger('ip_id')->unsigned()->nullable();;
            $table->foreign('ip_id')->references('id')->on('ips');
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
        Schema::dropIfExists('pfs');
    }
}
