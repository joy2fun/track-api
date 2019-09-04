<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('esl')->default(0);
            $table->tinyInteger('care')->default(0);
            $table->tinyInteger('contact')->default(0);
            $table->tinyInteger('compose')->default(0);
            $table->tinyInteger('computer')->default(0);
            $table->tinyInteger('compliment')->default(0);
            $table->tinyInteger('communication')->default(0);
            $table->string('notes', 4096);
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
        Schema::dropIfExists('records');
    }
}
