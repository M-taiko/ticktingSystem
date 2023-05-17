<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class  tickets extends Model
{
    use HasFactory;
    protected $fillable = ['id','TicketTitle', 'TicketNumber','DepartmentId','ReportingUser','Ticketstate','assignuser' ,'priority_id','createdBY','TicketDetails'];

   public function GetTheDepartmentName () {

    return $this->belongsTo(departmentes::class , 'DepartmentId');

   }
   public function priority()
   {
       return $this->belongsTo(priorities::class, 'priority_id');
   }
   public function comments()
   {
       return $this->hasOne(comments::class, 'ticket_id');
   }
   
   

}
