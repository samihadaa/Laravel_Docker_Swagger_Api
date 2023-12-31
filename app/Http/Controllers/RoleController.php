<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return response()->json([
            'roles' => $roles,
            'status' => 200,
        ]);
    }
    public function show($id){
        $role = Role::find($id);
        return response()->json([
            'role' => $role,
            'status' => 200,
        ]);
    }
    public function create(Request $request){
        $role = Role::create([
            'name' => $request->input('name'),
        ]);
        return response()->json([
            'role' => $role,
            'status' => 201,
        ]);
    }
    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->update($request->only('name'));
        return response()->json([
            'role' => $role,
            'status' => 200,
        ]);
    }
    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
