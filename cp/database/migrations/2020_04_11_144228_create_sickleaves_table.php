<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSickleavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sickleaves', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sickleaves');
    }
}