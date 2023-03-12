<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Video;


class VideoAlbum extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
