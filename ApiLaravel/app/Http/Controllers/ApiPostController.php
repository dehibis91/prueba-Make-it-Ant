<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ApiPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postGet()
    {
        //Get all Content of Model Post of DataBase
        $dataPost = Post::get();
        //validate if object $dataPost is empty
        if (!$dataPost->isEmpty()) {
            return response()->json([
                "data" => $dataPost
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Data not found"
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        //Create new Model Post (new content)
        $dataPost = new Post();
        $dataPost->userId = $request->userId;
        $dataPost->id = $request->id;
        $dataPost->title = $request->title;
        $dataPost->body = $request->body;
        $dataPost->save();
        return response()->json([
            "status" => 1,
            "message" => "Post created succesfull"
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataPost = Post::find($id);

        $dataPost->title = $request->title;
        $dataPost->body = $request->body;
        if ($dataPost->save()) {
            return response()->json([
                "status" => 1,
                "message" => "Post Update succesfull"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Error "
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request)
    {
        //comprobamos si existe el id
        if (Post::where("id", $request->id)->exists()) {
            $dataPost = Post::find($request->id);
            $dataPost->delete();
            return response()->json([
                "status" => 1,
                "message" => "Data deleted succesfull"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Data not found"
            ]);
        }
    }
}
