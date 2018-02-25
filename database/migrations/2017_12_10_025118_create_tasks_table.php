<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number');
            $table->text('sender');
            $table->text('to');
            $table->integer('cost_id')->unsigned();
            $table->integer('commodity_id')->unsigned();
            $table->double('weight');
            $table->text('payment');
            $table->integer('status_id')->unsigned();
            $table->text('letters');
            $table->tinyInteger('isRefund');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cost_id')->references('id')->on('costs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('commodity_id')->references('id')->on('commodities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
