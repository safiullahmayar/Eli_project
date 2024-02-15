<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'comment' => 'required',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
        } else {
            $comment = Comment::create(
                [
                    'comment' => $request->comment,
                    'task_id' => $request->task_id,
                    'user_id' => auth()->user()->id,

                ],
            );
            return response()->json(['message' => 'Comment added successfully', 'data' => $comment]);
        }
    }

    function getComments($id)
    {
        $comments = Comment::where('task_id', $id)->get();
        $html = '';
        foreach ($comments as $comment) {
            $html .=  '<div class="d-flex flex-column justify-content-center">' .
                '<h6 class="mb-0 text-sm">' . 'name :' . '&#160;' . $comment->user->name . '</h6>' .
                '<h6 class="mb-0 text-sm">' . $comment->comment . '</h6>' .
                '<p class="text-xs text-secondary mb-0">' . $comment->created_at->format("F j, Y, g:i a") . '</p>' .
                '</div>';
        }
        // Removed extra </div>
        return response()->json([
            'html' => $html,
        ], 200);
    }
}
