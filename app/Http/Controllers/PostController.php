<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
class PostController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth')->except(['index','view']);
    }

    public function index(){

      $data=Post::orderBy('id','desc')->paginate(4);
      return view('posts.index',['posts'=>$data]);
    }

    public function add(){
      $categories=Category::all();
      return view('posts.add',[
        'categories'=>$categories
      ]);
    }

    public function delete($id)
    {
      $post=Post::find($id);
      $post->delete();
      return redirect('/posts')->with('info','A post Deleted');
    }

    public function edit($id)
    {
      $post=Post::find($id);
      $categories=Category::all();
      return view('posts.edit',[
        'post'=>$post,
        'categories'=>$categories
      ]);
    }

    public function update($id)
    {

      $data=Post::find($id);
      $data->title=request()->title;
      $data->body=request()->body;
      $data->category_id=request()->category_id;
      $data->save();
      return redirect("/posts/view/$id");
    }

    public function create(){

      $validator = validator(request()->all(),[
        "title" => "required",
        "body" => "required",
        "category_id" => "required"
      ]);

      if($validator->fails()){
        return back()->withErrors($validator);
      }

      $data=new Post();
      $data->title=request()->title;
      $data->body=request()->body;
      $data->category_id=request()->category_id;
      $data->save();
      return redirect('/posts');
    }

    public function view($id){
      // return "Post view $id Controller";
      $post=Post::find($id);
      return view('posts.view',[
        'post'=>$post
      ]);
    }
}
