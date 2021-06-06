<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use Timestamp;
    protected $table = 'contact';
    protected $fillable=[
        'email',
        'name',
        'phone',
        'message',
    ];
}
