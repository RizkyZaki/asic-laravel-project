<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use App\Models\Song;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artists';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function album()
    {
        return $this->hasMany(Album::class, 'id_artist');
    }

    public function song()
    {
        return $this->hasMany(Song::class, 'id_artist');
    }
}
