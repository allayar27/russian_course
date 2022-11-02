<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {
        $this->authorize('viewAny', $comment);
        return new CommentCollection(Comment::orderBy('created_at', 'DESC')->get());
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('view', $comment);
        return response([new CommentResource($comment)],200);
    }


    public function create(CommentRequest $request, Comment $comment)
    {
        $this->authorize('create', $comment);
        $validated = $request->validated();
        $create = Comment::create($validated);
        if ($create){
            return \response([$create],201);
        }
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('delete', $comment);
        $delete = Comment::where('id', $id)->delete();
        if ($delete){
            return \response([
                'message' => 'Comment deleted successfully!'
            ],200);
        }
    }
}
