<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;
use App\Models\Album;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'id_artist');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'id_album');
    }
}
