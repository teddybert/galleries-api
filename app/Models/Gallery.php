<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\User;
use App\Models\Comment;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author_id'
        // 'image_url',
    ];

    public function image() {
        return $this->hasMany(Image::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id', 'id', 'users');
    }

    public function scopeSearchByName($query, $name) {
        $query->where('name', 'like', "%$name%");
    }

    public function scopeSearchByDescription($query, $description) {
        $query->where('description', 'like', "%$description%");
    }
}
