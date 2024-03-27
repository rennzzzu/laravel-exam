<?php

namespace App\Models;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'name',
        'year',
        'sales',
    ];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }
    
}
