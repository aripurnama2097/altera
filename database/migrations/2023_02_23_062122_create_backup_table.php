<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backup', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
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
            $table->string('status');
            $table->string('remark');
            $table->date('record');
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
        Schema::dropIfExists('backup');
    }
}
