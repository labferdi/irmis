<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PhotoAlbum;

class Photo extends Model
{
    use HasFactory;

    public function album()
    {
        return $this->belongsTo(PhotoAlbum::class);
    }
}
