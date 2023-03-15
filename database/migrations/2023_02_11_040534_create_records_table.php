<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('old_part_no');
            $table->string('new_part_no');
            $table->string('model');
            $table->bigInteger('start_serial');
            $table->date('running_date');
            $table->string('wu');
            $table->string('model_no');
            $table->bigInteger('start_serial_pso');
            $table->bigInteger('end_serial');
            $table->string('pso_date');
            $table->string('qty');
            $table->string('lot_qty');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('smt_date');
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
