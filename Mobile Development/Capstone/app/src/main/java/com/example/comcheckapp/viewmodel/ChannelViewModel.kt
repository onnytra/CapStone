package com.example.comcheckapp.viewmodel

import android.util.Log
import android.widget.Toast
import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.example.comcheckapp.model.ResponseAnasenti
import com.example.comcheckapp.model.ResponseChannel
import com.example.comcheckapp.model.ResponsePostChannel
import com.example.comcheckapp.network.ApiService
import dagger.hilt.android.lifecycle.HiltViewModel
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import javax.inject.Inject

@HiltViewModel
class ChannelViewModel @Inject constructor(private val apiService: ApiService):ViewModel() {

    private val _getChannelData = MutableLiveData<ResponseChannel>()
    val getChannelData:LiveData<ResponseChannel> = _getChannelData

    private val _getAnasentiData = MutableLiveData<ResponseAnasenti>()
    val getAnasenti:LiveData<ResponseAnasenti> = _getAnasentiData

    private val _postData = MutableLiveData<ResponsePostChannel>()
    val postData:LiveData<ResponsePostChannel> = _postData


    fun anasentiData(){
        apiService.getAnasenti().enqueue(object :Callback<ResponseAnasenti>{
            override fun onResponse(
                call: Call<ResponseAnasenti>,
                response: Response<ResponseAnasenti>
            ) {
                if (response.isSuccessful){
                    _getAnasentiData.value = response.body()
                } else {
                    Log.e("Channel VM Anasenti","Error")
                }
            }

            override fun onFailure(call: Call<ResponseAnasenti>, t: Throwable) {
                Log.e("Channel VM Anasenti","Error")
            }

        })
    }


    fun channelData(){
        apiService.getChannel().enqueue(object : Callback<ResponseChannel>{
            override fun onResponse(
                call: Call<ResponseChannel>,
                response: Response<ResponseChannel>
            ) {
                if (response.isSuccessful){
                    _getChannelData.value = response.body()
                } else {
                    Log.e("Channel VM","Error")
                }
            }

            override fun onFailure(call: Call<ResponseChannel>, t: Throwable) {
                Log.e("Channel VM","Error")
            }

        })
    }

    fun postChannel(channel:String,link:String,id:String){
        apiService.postChannel(channel,link,id).enqueue(object :Callback<ResponsePostChannel>{
            override fun onResponse(
                call: Call<ResponsePostChannel>,
                response: Response<ResponsePostChannel>
            ) {
               if (response.isSuccessful){
                   _postData.value = response.body()
               } else {
                   Log.e("Channel VM Post","Error")
               }
            }

            override fun onFailure(call: Call<ResponsePostChannel>, t: Throwable) {
                Log.e("Channel VM Post","Error")
            }

        })
    }

}