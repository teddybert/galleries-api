<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, $gallery_id) {
        $data = $request->validated();
        $author_id = auth()->user()->id;
        $content = array_merge($data, ['author' => $author_id, 'gallery_id' => $gallery_id]);
        $comment = Comment::create($content);
        return response()->json($comment);
    }
}
