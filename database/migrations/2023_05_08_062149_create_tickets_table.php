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
         Schema::create('tickets', function (Blueprint $table) {
             $table->increments('id');
             $table->string('TicketTitle');
             $table->string('TicketNumber');
             $table->foreignId('DepartmentId')->constrained('departmentes')->onDelete('cascade');
             $table->integer('priority_id')->unsigned();
             $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
           
             $table->string('ReportingUser');
             $table->string('Ticketstate');
             $table->string('TicketDetails');
             $table->string('assignuser')->nullable();
             $table->string('createdBY');
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
        Schema::dropIfExists('tickets');
    }
};
