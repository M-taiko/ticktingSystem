<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'ticket_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'solving_User',
        'comment_text',
    ];


    public function ticket()
    {
        return $this->belongsTo(tickets::class, 'ticket_id');
    }
  
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
