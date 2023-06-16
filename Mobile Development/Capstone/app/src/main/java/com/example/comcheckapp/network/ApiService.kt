package com.example.comcheckapp.network

import com.example.comcheckapp.model.ResponseAnasenti
import com.example.comcheckapp.model.ResponseChannel
import com.example.comcheckapp.model.ResponsePostChannel
import retrofit2.Call
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Query

interface ApiService {

    @POST("channel")
    fun postChannel(
        @Query("channel") channel:String,
        @Query("link_konten") link_konten:String,
        @Query("id_user") id_user:String
    ):Call<ResponsePostChannel>

    @GET("channel")
    fun getChannel():Call<ResponseChannel>

    @GET("anasenti")
    fun getAnasenti():Call<ResponseAnasenti>


}