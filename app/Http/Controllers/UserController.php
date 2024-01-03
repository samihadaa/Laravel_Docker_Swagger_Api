<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return response()->json([
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->only('email', 'first_name', 'last_name')+['password' => Hash::make(123456)]);
        return response()->json([
            'user' => $user,
            'status' => 203,
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
        $user = User::find($id);
        return response()->json([
            'user' => $user,
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
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return response()->json([
            'message' => 'user deleted successfully',
        ]);
    }
    public function userUpdateInfo(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            'user' => $user,
        ]);
    }
    public function updatePassword(updateInfoRequest $request){
        $user = $request->user();
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);
        return response()->json([
            'user' => $user,
        ]);
    }
}
