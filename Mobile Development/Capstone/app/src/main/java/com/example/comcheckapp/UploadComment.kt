package com.example.comcheckapp

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import androidx.activity.viewModels
import androidx.core.content.ContextCompat
import com.example.comcheckapp.databinding.ActivityUploadCommentBinding
import com.example.comcheckapp.viewmodel.ChannelViewModel
import com.google.android.material.floatingactionbutton.FloatingActionButton
import dagger.hilt.android.AndroidEntryPoint

@AndroidEntryPoint
class UploadComment : AppCompatActivity() {

    private lateinit var binding:ActivityUploadCommentBinding
    lateinit var addStoryUpload: FloatingActionButton
    private val channelVm: ChannelViewModel by viewModels()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityUploadCommentBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.btnSubmit.setOnClickListener {
            val channel = binding.edtChannel.text.toString()
            val link  = binding.linkKonten.text.toString()
            val idUser = binding.edtUser.text.toString()

            channelVm.postChannel(channel,link,idUser)
            channelVm.postData.observe(this){
                if (it.success == true){
                    Toast.makeText(this, "Video Berhasil Ditambahkan", Toast.LENGTH_SHORT).show()
                    val intent = Intent(this, MainActivity::class.java)
                    startActivity(intent)
                    finish()
                }
            }
        }


    }
}