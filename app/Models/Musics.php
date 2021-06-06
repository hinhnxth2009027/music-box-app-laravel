<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Musics extends Model
{
    use HasFactory;
    public $timestamps = TRUE;
    protected $fillable = [
        'song_key',
        'song_name',
        'thumbnail',
        'song_file',
        'author',
        'public_by_id',
        'public_by',
        'lyrics'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
