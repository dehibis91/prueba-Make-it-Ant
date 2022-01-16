<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Get all data
        $post = Http::get('https://jsonplaceholder.typicode.com/posts');        
        //Conver data in Json
        $postArray = $post->json();
        //render data whith compact() in View home
        return view('home', compact('postArray'));        
    }

    public function savePostToBd(Post $post)
    { 
        //Get all data of api 
        $res =  Http::get('https://jsonplaceholder.typicode.com/posts');
        //Convert type data in json
        $dataPost = json_decode($res->getBody()->getContents(), true);
        //loop foreach for capture the properties of every item and save in database
        echo ("<a href='/dasboard'><button>Ir al dasboard local</button></a>");
        echo ("<br>");
        echo ("<hr>");

        foreach ($dataPost as $item) {
            if(Post::where("id", $item["id"])->exists()){
                echo ("El Registro ".$item["id"]." ya existe en la Base de datos, unicammente se registrarán nuevos datos "."<br>" );
            }else{
                $newPost = new Post();
                $newPost->id = $item["id"];
                $newPost->title = $item["title"];
                $newPost->body = $item["body"];
                $newPost->save();
                
            }           
          }          
    }
    public function dasboard(){
        return view('post.index');
    }
}
