<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function index()
    {

        $postsFromDB=Post::all();

        return view('index',['posts'=>$postsFromDB]);
    }
    public function show($post)
    {
        //we can type hint or instead of the next step
        //public function show(Post $post)
        $singlePost=Post::findOrfail($post);
        return view('show',['post'=>$singlePost]);
    }
    public function create(){
        $users=User::all();
        return view('create',['users'=>$users]);
    }
    public function store(){
        $data=request();
        $post=Post::create(['title'=>$data->title,'description'=>$data->description,'user_id'=>$data->user_id]);
        return redirect(route('posts.index'));
    }
    public function edit($post){
        $singlePost=Post::findOrfail($post);
        $users=User::all();
        return view('edit',['post'=>$singlePost,'users'=>$users]);
    }
    public function update($post){
        $singlePost=Post::findOrfail($post);
        $data=request();
        $singlePost->update(['title'=>$data->title,'description'=>$data->description ,'user_id'=>$data->user_id]);
        return redirect(route('posts.index'));
    }
    public function destroy($post){
        $singlePost=Post::findOrfail($post);

        $singlePost->delete($singlePost);
        return redirect(route('posts.index'));

    }
}
