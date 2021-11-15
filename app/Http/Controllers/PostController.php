<?php //parte guest

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {   
        $posts = Post::all();
        return view("guest.posts.index", compact("posts"));
    }

    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();

        //condizione post vuoto o inesistente
        if(!$post) {
            abort("404"); //cosi non mi stampa errore laravel con codice
        }

        return view("guest.posts.show", compact("post"));
    }
}
