<?php

namespace App\Http\Controllers;

use App\Models\channelsosmed;
use Illuminate\Http\Request;

class ChannelsosmedController extends Controller
{
    public function index()
    {
        $channelsosmed = channelsosmed::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data channelsosmed',
            'data' => $channelsosmed
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['link_konten']=str_replace("https://youtu.be/","",$input['link_konten']);
        $channelsosmed = channelsosmed::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menambahkan channelsosmed',
            'data' => $channelsosmed
        ], 200);
    }

    public function show($id)
    {
        $channelsosmed = channelsosmed::find($id);
        if (is_null($channelsosmed)){
            return response()->json([
                'success' => false,
                'message' => 'Data channelsosmed tidak ditemukan',
                'data' => $channelsosmed
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail data channelsosmed',
            'data' => $channelsosmed
        ], 200);
    }
    public function showbyuser($id)
    {
        $channelsosmed = channelsosmed::where('id_user', $id)->get();
        if ($channelsosmed->isEmpty()){
            return response()->json([
                'success' => false,
                'message' => 'Data channelsosmed tidak ditemukan',
                'data' => $channelsosmed
            ], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail data channelsosmed',
            'data' => $channelsosmed
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\channelsosmed  $channelsosmed
     * @return \Illuminate\Http\Response
     */
    public function edit(channelsosmed $channelsosmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\channelsosmed  $channelsosmed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, channelsosmed $channelsosmed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\channelsosmed  $channelsosmed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channelsosmed = channelsosmed::find($id);
        if (is_null($channelsosmed)){
            return response()->json([
                'success' => false,
                'message' => 'Data channelsosmed tidak ditemukan',
                'data' => $channelsosmed
            ], 400);
        }
        $channelsosmed->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data channelsosmed berhasil dihapus',
        ], 200);
    }
}
