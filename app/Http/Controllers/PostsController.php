<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\comment;
use App\User;
class PostsController extends Controller

{


   public function __construct()

   {

       $this->middleware('auth');

   }


   public function index(){
      $posts = Post::orderBy('id')->get();
      $comments = comment::orderBy('id')->get();
      $users = User::all();
      
       return view('posts.list')->with('posts', $posts)->with('comments',$comments)->with('users',$users);

   }


   public function create() {

       return view('posts.create');

   }


   public function store(){

       request()->validate([

           'image_path' => ['required', 'image']          

       ]);      

       $post = Post::create([

           'user_id' => auth()->id(),

           'image_path' => request()->file('image_path')->store('posts', 'public'),

           'description' => request('description'),

           'filter' => request('filter'),

           'likes' => 0

       ])->save();


       return redirect()->route('publications');

   }
  public function delete ($id) {
    $posts = Post::destroy($id);
    return redirect()->route('publications'); 
  }

public function like($id){
  // código de minha autoria, encontrará esse código em outros projetos, pois ajudei-os.
    $users = User::all();
    $comments = comment::all();
    $post_like = Post::findOrFail($id);
    $person_like = Auth()->user()->id;
    if ($post_like->person_like != $person_like) {
      $post_like->person_like = $person_like;
      $post_like->likes += 1;
      $post_like->save();
      $posts = Post::all();
      return view('posts.list')->with('posts', $posts)->with('comments', $comments)->with('users',$users);
    } else {
      $post_like->likes = $post_like->likes;
      $posts = Post::all();
      return view('posts.list')->with('posts', $posts)->with('comments', $comments)->with('users', $users);
    }

   }

  public function deslike($id){
    // código de minha autoria, encontrará esse código em outros projetos, pois ajudei-os.
    $users = User::all();
    $comments = comment::all();
    $post_like = Post::findOrFail($id);
    $person_like = Auth()->user()->id;
    if ($post_like->likes > 0) {
      if ($post_like->person_like == $person_like) {
        $post_like->person_like-=1;
        $post_like->likes -=1;
        $post_like->save();
        $posts = Post::all();
        return view('posts.list')->with('posts', $posts)->with('comments', $comments)->with('users', $users);
      } else {
        $posts = Post::all();
        return view('posts.list')->with('posts', $posts)->with('comments', $comments)->with('users', $users);
      }
    } else {
        $posts = Post::all();
        return view('posts.list')->with('posts', $posts)->with('comment', $comments)->with('users', $users);
    }
  }
}
