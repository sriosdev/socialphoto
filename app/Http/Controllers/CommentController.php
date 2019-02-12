<?php

namespace App\Http\Controllers;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function save(Request $request) {
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        $user = \Auth::user();
        $comment = new Comment();

        $comment->user_id = $user->id;
        $comment->image_id = $request->input('image_id');
        $comment->content = $request->input('content');

        $comment->save();

        return redirect()->route('photo.detail', ['id' => $comment->image_id])
                            ->with(['message' => 'Your comment has been published successfully']);
    }


    public function delete($id) {
        $user = \Auth::user();
        $comment = Comment::find($id);

        //Check post or comment owner
        if ($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)) {
            $comment->delete();

            return redirect()->route('photo.detail', ['id' => $comment->image_id])
                            ->with(['message' => 'Your comment has been delete successfully']);
        }
        else {
            return redirect()->route('photo.detail', ['id' => $comment->image_id])
                            ->with(['message' => 'Unable to delete your comment']);
        }
    }
}
