<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\VideoAlbum;

class Video extends Model
{
    use HasFactory;

    public function album()
    {
        return $this->belongsTo(VideoAlbum::class);
    }
}
