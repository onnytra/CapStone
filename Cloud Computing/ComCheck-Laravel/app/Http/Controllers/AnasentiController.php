<?php

namespace App\Http\Controllers;

use App\Models\anasenti;
use Illuminate\Http\Request;

class AnasentiController extends Controller
{
    public function index()
    {
        $anasenti = anasenti::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data anasenti',
            'data' => $anasenti
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $anasenti = anasenti::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menambahkan anasenti',
            'data' => $anasenti
        ], 200);
    }

    public function show($id)
    {
        $anasenti = anasenti::find($id);
        if (is_null($anasenti)){
            return response()->json([
                'success' => false,
                'message' => 'Data anasenti tidak ditemukan',
                'data' => $anasenti
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail data anasenti',
            'data' => $anasenti
        ], 200);
    }

    public function showbychannel($id){
        $anasenti = anasenti::where('id_channel', $id)->get();
        if ($anasenti->isEmpty()){
            return response()->json([
                'success' => false,
                'message' => 'Data anasenti tidak ditemukan',
                'data' => $anasenti
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail data anasenti',
            'data' => $anasenti
        ], 200);
    }
    public function edit(anasenti $anasenti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anasenti  $anasenti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anasenti $anasenti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anasenti  $anasenti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anasenti = anasenti::find($id);
        if (is_null($anasenti)){
            return response()->json([
                'success' => false,
                'message' => 'Data anasenti tidak ditemukan',
                'data' => $anasenti
            ], 400);
        }
        $anasenti->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data anasenti berhasil dihapus',
            'data' => $anasenti
        ], 200);
    }
}
