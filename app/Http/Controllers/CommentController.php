<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Task;

class CommentController extends Controller
{
    public function index(Task $task)
    {
        return CommentResource::collection(
            $task->comments()->paginate(10)
        );
    }

    public function store(
        StoreCommentRequest $request,
        Task $task
    ) {
        $comment = Comment::create([
            'task_id' => $task->id,
            'user_id' =>
                $request->validated()['user_id'],
            'content' =>
                $request->validated()['content'],
        ]);

        return new CommentResource($comment);
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(
        StoreCommentRequest $request,
        Comment $comment
    ) {
        $comment->update(
            $request->validated()
        );

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->noContent();
    }
}
