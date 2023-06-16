<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\anasenti;
use App\Models\channelsosmed;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $countUser= User::count();
        $countChannel= channelsosmed::count();
        $countSentimen= anasenti::count();
        return view('projects.index', compact('users','countUser','countChannel','countSentimen'));
    }

    public function detailuser($id){
        $users = User::where('id_user', $id)->first();
        $channels = channelsosmed::with('user')->where('id_user', $id)->get();
        return view('projects.detail', compact('users','channels'));
    }

    public function detailchannel($id){
        $channels = channelsosmed::where('id_channel', $id)->first();
        $sentimen = anasenti::with('channelsosmed')->where('id_channel', $id)->get();
        return view('projects.senti', compact('channels','sentimen'));
    }

    public function store(Request $request)
    {
        $inputUser = $request->all();
        $validator = Validator::make(
            $inputUser,
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator -> fails()) {
            return redirect('/')->with('error', 'Data Gagal Ditambahkan');
        }
        $user = User::create($inputUser);
        $user->save();
        return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function storechannel(Request $request)
    {
        $inputChannel = $request->all();
        $validator = Validator::make(
            $inputChannel,
            [
                'channel' => 'required',
                'link_konten' => 'required',
                'id_user' => 'required'
            ]
        );
        if ($validator -> fails()) {
            return redirect('/')->with('error', 'Data Gagal Ditambahkan');
        }
        $channel = channelsosmed::create($inputChannel);
        $channel->save();
        return Redirect::back()->with('success', 'Data Berhasil Ditambahkan');
        // return redirect('/')->with('success', 'Data Berhasil Ditambahkan');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
