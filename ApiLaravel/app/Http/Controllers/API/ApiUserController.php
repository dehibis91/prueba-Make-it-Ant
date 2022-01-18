<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //Get all Content of Model Post of DataBase
                $dataUser = User::get();
                //validate if object $dataPost is empty
                if (!$dataUser->isEmpty()) {
                    return response()->json([
                        "data" => $dataUser
                    ]);
                } else {
                    return response()->json([
                        "status" => 0,
                        "message" => "Data not found"
                    ]);
                }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //Create new Model Post (new content)
                $dataUser = new User();
                $dataUser->name = $request->name;
                $dataUser->email = $request->email;
                $dataUser->password = Hash::make($request->password);
                $dataUser->city = $request->city;
                $dataUser->company = $request->company;
                $dataUser->save();
                return response()->json([
                    "status" => 1,
                    "message" => "User created succesfull"
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        //comprobamos si existe el id
        if (User::where("id", $request->id)->exists()) {
            $dataUser = User::find($request->id);
            $dataUser->delete();
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
