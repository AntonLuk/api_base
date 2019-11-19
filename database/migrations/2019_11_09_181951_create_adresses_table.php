<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->bigIncrements('id1');
            $table->bigInteger('id');
            $table->bigInteger('type_id');
            $table->bigInteger('area_id')->nullable();
            $table->bigInteger('region_id')->nullable();
            $table->string('name')->nullable();
            $table->string('post_index')->nullable();
            $table->string('code')->nullable();
            $table->string('fns_code')->nullable();
            $table->string('fns_inspection')->nullable();
            $table->string('status')->nullable();
            $table->string('okato')->nullable();
            $table->string('type')->nullable();
            $table->string('region')->nullable();
            $table->string('region_type')->nullable();
            $table->string('area')->nullable();
            $table->string('area_type')->nullable();
            $table->string('text')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('adresses');
    }
}
