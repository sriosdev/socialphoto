<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Image;
use App\Comment;
use App\Like;

class ImageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function create() {
        return view('image.create');
    }


    public function save(Request $request) {
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image'
        ]);

        $image_path = $request->file('image_path');
        $description = $request->input('description');

        $user = \Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->image_path = null;
        $image->description = $description;

        if ($image_path) {
            $image_path_name = time().$image_path->getClientOriginalName().$user->id;
            \Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('home')
                            ->with(['message' => 'Your image has been successfully uploaded']);
    }


    public function delete($id) {
        $user = \Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if ($user && $image && $image->user->id == $user->id) {
            // Comments
            if ($comments && count($comments) > 0) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            // Likes
            if ($likes && count($likes) > 0) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            // Image
            Storage::disk('images')->delete($image->image_path);
            $image->delete();

            $message = ['message' => 'The image has been deleted successfully'];
        }
        else {
            $message = ['message' => 'Couldn\'t delete image'];
        }

        return redirect()->route('user.profile', ['id' => $user->id])->with($message);
    }


    public function edit($id) {
        $user = \Auth::user();
        $image = Image::find($id);

        if ($user && $image && $image->user->id == $user->id) {
            return view('image.edit',
                ['image' => $image]
            );
        }
        else {
            return redirect()->route('home');
        }
    }


    public function update(Request $request) {
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_id' => 'required'
        ]);

        $image_id = $request->input('image_id');
        $description = $request->input('description');

        $image = Image::find($image_id);
        $image->description = $description;
        $image->update();

        return redirect()->route('photo.detail', ['id' => $image_id])
                            ->with(['message' => 'The photo description has been update successfully']);
    }


    public function getImage($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }


    public function detail($id) {
        $image = Image::find($id);

        return view('image.detail', ['image' => $image]);
    }
}
