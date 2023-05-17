<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class  tickets extends Model
{
    use HasFactory;
    protected $fillable = ['id','TicketTitle', 'TicketNumber','DepartmentId','ReportingUser','Ticketstate','createdBY','TicketDetails'];

   public function GetTheDepartmentName () {

    return $this->belongsTo(departmentes::class , 'DepartmentId');

   }

}
