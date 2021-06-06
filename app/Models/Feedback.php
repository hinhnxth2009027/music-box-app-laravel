<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    use Timestamp;
    protected $fillable=[
      'user_id',
      'email',
      'message',
      'star'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
