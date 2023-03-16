<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_header', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
            $table->string('old_part_no');
            $table->string('new_part_no');
            $table->string('model');
            $table->bigInteger('start_serial');
            $table->date('running_date');
            $table->string('wu');
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
        Schema::dropIfExists('format_header');
    }
}
