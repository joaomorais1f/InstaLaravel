<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\comment;
use App\User;

class UserController extends Controller

{


    public function __construct()

    {

        $this->middleware('auth');
    }


    public function index($id)
    {
        $users = User::findOrFail($id);
        return view('user.account')->with('users', $users);
    }


    public function data(request $data)
    {

        request()->validate([
            'avatar_path' => ['required', 'image']

        ]);

        $users = User::findOrFail(Auth()->id());
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->avatar_path = request()->file('avatar_path')->store('profile', 'public');
        $users->save();
        return redirect()->route('publications');
    }

    public function deleteaccount($id)
    {
        $users = User::destroy($id); 
        $posts = Post::where('user_id',$id)->get();
        $likes = Post::where('person_like',$id)->get();
        $comments = comment::where('user_id', $id)->get();
        foreach ($comments as $comment) {
            if ($comment->id > 0) {
            $id_comentario = $comment->id;
            $comments = comment::destroy($id_comentario);
            }
        }
        foreach ($likes as $like) {
            if ($like->likes > 0) {
                if ($like->person_like == $id) {
                    $like->person_like-=1;
                    $like->likes -=1;
                    $like->save();
                }
            }
        }
        
        $posts = Post::destroy($id);
        return redirect()->route('publications');
        
    }

}
