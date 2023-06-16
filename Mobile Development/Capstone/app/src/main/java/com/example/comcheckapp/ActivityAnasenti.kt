package com.example.comcheckapp

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.LinearLayout
import androidx.activity.viewModels
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.comcheckapp.adapter.AnasentiAdapter
import com.example.comcheckapp.databinding.ActivityAnasentiBinding
import com.example.comcheckapp.viewmodel.ChannelViewModel
import dagger.hilt.android.AndroidEntryPoint

@AndroidEntryPoint
class ActivityAnasenti : AppCompatActivity() {

    private lateinit var binding:ActivityAnasentiBinding
    private val channelVm: ChannelViewModel by viewModels()
    private lateinit var adapterAnasenti:AnasentiAdapter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityAnasentiBinding.inflate(layoutInflater)
        setContentView(binding.root)

        channelVm.anasentiData()
        channelVm.getAnasenti.observe(this){anasenti ->
            binding.rvAnasenti.apply {
                layoutManager = LinearLayoutManager(this@ActivityAnasenti)
                adapter = AnasentiAdapter(anasenti.data)
                setHasFixedSize(true)
            }
        }
    }
}