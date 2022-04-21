<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'author_id',
        'gallery_id',
    ];

    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
