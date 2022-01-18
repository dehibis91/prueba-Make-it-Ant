<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\User;

use function GuzzleHttp\Promise\each;

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
        return view('home');
    }

    public function savePostToBd(Post $post)
    {
        //Get all data of api 
        $res =  Http::get('https://jsonplaceholder.typicode.com/posts');
        //Convert type data in json
        $dataPost = json_decode($res->getBody()->getContents(), true);
        //loop foreach for capture the properties of every item and save in database
        echo ("<a href='/post'><button>Ir al dasboard local</button></a>");
        echo ("<br>");
        echo ("<hr>");

        foreach ($dataPost as $item) {
            if (Post::where("id", $item["id"])->exists()) {
                echo ("El Registro " . $item["id"] . " ya existe en la Base de datos, unicammente se registrarán nuevos datos " . "<br>");
            } else {
                $newPost = new Post();
                $newPost->id = $item["id"];
                $newPost->title = $item["title"];
                $newPost->body = $item["body"];
                $newPost->save();
            }
        }
    }

    public function saveUserToBd(User $user)
    {
        //Get all data user
        $res =  Http::get('https://jsonplaceholder.typicode.com/users');
        //Convert type data in json
        $dataUser = json_decode($res->getBody()->getContents(), true);
        //loop foreach for capture the properties of every item and save in database
        echo ("<a href='/user'><button>Ir al dasboard local</button></a>");
        echo ("<a href='/home'><button>Volver</button></a>");
        echo ("<br>");
        echo ("<hr>");        
  
        

        foreach ($dataUser as $item) {

            if (User::where("id", $item["id"])->exists()) {
                echo ("El Registro " . $item["id"] . " - " .$item["name"]. " ya existe en la Base de datos, unicammente se registrarán nuevos datos " . "<br>");
            } else {
                $passwordGen = self::generatePassword(8);
                $newUser = new User();
                $newUser->id = $item["id"];
                $newUser->name = $item["name"];
                $newUser->email = $item["email"];
                $newUser->password = $passwordGen;
                $newUser->city = $item["address"]["city"];
                $newUser->company = $item["company"]["name"];
                $newUser->save();               
                
            }
        }
    }

    //fucntion for generate password dinamic for save in data base
    function generatePassword($length)
    {
        $key = "";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $length; $i++) {
            $key .= substr($pattern, mt_rand(0, $max), 1);
        }
        return $key;
    }
}
