<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Photo;


class PhotoAlbum extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
