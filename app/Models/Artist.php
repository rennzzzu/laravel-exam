<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    public function albums() {
        return $this->hasMany(Album::class);
    }

    public function scopeFilter($query, array $filters)
    {
        
        if ($filters['artist'] ?? false) {
            $query->where('name', 'like', '%' . request('artist') . '%');
        }
    }
}
