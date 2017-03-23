<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('entity_id')->unsigned()->nullable();
            $table->string('icon')->nullable();
            $table->string('class')->nullable();
            $table->string('text');
            $table->text('assets')->nullable();
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('logs_types')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
