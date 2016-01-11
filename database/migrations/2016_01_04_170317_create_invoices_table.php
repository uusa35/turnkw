<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ref');
            $table->string('from');
            $table->string('to');
            $table->string('project');
            $table->integer('po');
            $table->timestamp('project_date');
            $table->string('project_manager');
            $table->string('payment_method');
            $table->timestamp('due_date');
            $table->integer('total_no');
            $table->string('total_words');
            $table->integer('due_now');
            $table->text('notes');
            $table->string('signed_by');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
