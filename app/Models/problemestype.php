<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class problemestype extends Model
{
    use HasFactory;
    protected $fillable = ['id','ProblemName', 'ProblemType','timestamps'];
}
