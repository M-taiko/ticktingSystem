<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('solving_User')->nullable();
      
            $table->longText('comment_text');
            
            $table->integer('ticket_id')->unsigned();
            
            $table->foreign('ticket_id')->references('id')->on('tickets');
            
            $table->foreignId('user_id')->references('id')->on('users');

          

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
