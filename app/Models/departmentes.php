<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departmentes extends Model
{
    use HasFactory;
    protected $fillable = ['id','DepartmentName', 'DepartmentHead', 'DepartmentArea','timestamps'];
}
