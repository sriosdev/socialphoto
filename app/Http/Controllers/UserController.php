<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }


    public function update(Request $request) {
        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->nick = $request->input('nick');
        $user->email = $request->input('email');

        // Upload image
        $image_path = $request->file('image_path');
        if ($image_path) {
            $image_path_name = time().$user->nick.$user->id;
            \Storage::disk('users')->put($image_path_name, File::get($image_path));
            $user->image = $image_path_name;
        }

        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'Update complete']);
    }


    public function getImage($file_name) {
        $file = Storage::disk('users')->get($file_name);

        return new Response($file, 200);
    }
}
