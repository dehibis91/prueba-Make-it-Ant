<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',[
            'dataUser'=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUser = new User();
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->password = Hash::make($request->password);
        $dataUser->city = $request->city;
        $dataUser->company = $request->company;
        $dataUser->save();
        return redirect ('/user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id, Post $post )
    {
        $users = User::with("posts")->get();
       
        return view ('user.show',[
            'dataUser' =>$users  
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
        $dataUser = User::find($id);

        return view ('user.edit',[
              'dataUser' =>$dataUser  
        ]);
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
        $dataUser = User::find($id);
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->password = Hash::make($request->password);
        $dataUser->city = $request->city;
        $dataUser->company = $request->company;
        $dataUser->save();

        return redirect ('/user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataUser = User::find($id);
        $dataUser->delete();
        return back();
    }

}
