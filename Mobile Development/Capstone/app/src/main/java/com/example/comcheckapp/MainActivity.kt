package com.example.comcheckapp

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.activity.viewModels
import androidx.core.content.ContextCompat
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.comcheckapp.adapter.ChannelAdapter
import com.example.comcheckapp.databinding.ActivityMainBinding
import com.example.comcheckapp.viewmodel.ChannelViewModel
import com.google.android.material.floatingactionbutton.FloatingActionButton
import com.pierfrancescosoffritti.androidyoutubeplayer.core.player.views.YouTubePlayerView
import dagger.hilt.android.AndroidEntryPoint

@AndroidEntryPoint
class MainActivity : AppCompatActivity(),ChannelAdapter.AddLifecycleCallbackListener  {

    lateinit var addStoryFloat: FloatingActionButton
    private lateinit var binding:ActivityMainBinding
    private val channelVm:ChannelViewModel by viewModels()
    private lateinit var channelAdapter:ChannelAdapter



    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.addStoryFloat.setOnClickListener {
            val intent = Intent(this,UploadComment::class.java)
            startActivity(intent)
        }

        binding.btnAnalis.setOnClickListener {
            val intent = Intent(this,ActivityAnasenti::class.java)
            startActivity(intent)
        }

        channelVm.channelData()
        channelVm.getChannelData.observe(this){channel ->
            binding.rvListStory.apply {
                layoutManager =  LinearLayoutManager(this@MainActivity,LinearLayoutManager.VERTICAL,false)
                channelAdapter = ChannelAdapter(channel.data)
                adapter = channelAdapter
            }
        }

        addStoryFloat = findViewById(R.id.add_story_float)
        addStoryFloat.setColorFilter(ContextCompat.getColor(this, R.color.white))
    }

    override fun addLifeCycleCallBack(youTubePlayerView: YouTubePlayerView) {
        lifecycle.addObserver(youTubePlayerView)
    }
}