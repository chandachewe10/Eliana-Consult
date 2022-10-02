<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('file_id');
            $table->string('filename');
            $table->timestamps();
        });


        Schema::table('file_items', function($table) {
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_items');
    }
}
