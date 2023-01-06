<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;
use App\Models\Song;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'id_artist');
    }

    public function song()
    {
        return $this->hasMany(Song::class, 'id_album');
    }
}
