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
             $table->bigIncrements('id');
             $table->string('TicketTitle');
             $table->integer('TicketNumber');
             $table->foreignId('DepartmentId')->constrained('departmentes');
             $table->string('ReportingUser');
             $table->string('Ticketstate');
             $table->string('TicketDetails');
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
