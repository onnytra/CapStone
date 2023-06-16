<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $User = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data User',
            'data' => $User
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator -> fails()) {
            return response()->json([
                'data' => $input,
                'success' => false,
                'message' => 'Gagal Menambahkan User',
                'data' => $validator->errors()
            ], 400);
        }
        $User = User::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menambahkan User',
            'data' => $User
        ], 200);
    }

    public function show($id)
    {
        $User = User::find($id);
        if (is_null($User)){
            return response()->json([
                'success' => false,
                'message' => 'Data User tidak ditemukan',
                'data' => $User
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail data User',
            'data' => $User
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User, $id)
    {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator -> fails()) {
            return response()->json([
                'data' => $input,
                'success' => false,
                'message' => 'Gagal Mengubah User',
                'data' => $validator->errors()
            ], 400);
        }
        $User = User::find($id);
        if (is_null($User)){
            return response()->json([
                'success' => false,
                'message' => 'Data User tidak ditemukan',
                'data' => $User
            ], 400);
        }
        $User->name = $input['name'];
        $User->email = $input['email'];
        $User->phone = $input['phone'];
        $User->password = $input['password'];
        $User->save();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Mengupdate User',
            'data' => $User
        ], 200);
    }

    public function destroy($id)
    {
        $User = User::find($id);
        if (is_null($User)){
            return response()->json([
                'success' => false,
                'message' => 'Data User tidak ditemukan',
                'data' => $User
            ], 400);
        }
        $User->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus User',
            'data' => $User
        ], 200);
    }
}
