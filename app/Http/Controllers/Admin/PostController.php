<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view("admin.posts.index", compact("posts"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.posts.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "string|required|max:100",
            "content" => "string|required",
            "tags" => "exists:tags,id"  //verifica se esistono i tags nella tabella
        ]);

        $newPost = new Post();
        $newPost ->fill($request->all());
        $slug = Str::of($request->title)->slug("-");

        //per l-improbabile caso che ci sia un titolo ripetuto
        $postExist = Post::where("slug", $slug)->first();

        $cont = 2;
            
        while($postExist) {
            $slug = Str::of($request->title)->slug("-");
            $postExist = Post::where("slug", $slug)->first();
            $cont++;
                
        }

        $newPost->slug = $slug;

        $newPost->save();

        $newPost->tags()->attach($request->tags);

        return redirect()->route("admin.posts.index")->with("success", "Il post è stato pubblicato");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "string|required|max:100",
            "content" => "string|required"
        ]);

        if($post->title != $request->title){
            $slug = Str::of($request->title)->slug("-");
            
            //per l-improbabile caso che ci sia un titolo ripetuto
            $postExist = Post::where("slug", $slug)->first();
            
            $cont = 2;
            
            while($postExist) {
                $slug = Str::of($request->title)->slug("-");
                $postExist = Post::where("slug", $slug)->first();
                $cont++;
                
            }
            
            $post->slug = $slug;
        }
        
        $post->fill($request->all());
        $post->save();

        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
