<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        // 'author_id'
    ];

    public function scopeSearchByName($query, $name) {
        $query->where('name', 'like', "%$name%");
    }

    public function scopeSearchByDescription($query, $description) {
        $query->where('description', 'like', "%$description%");
    }
}
