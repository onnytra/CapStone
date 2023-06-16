package com.example.comcheckapp.adapter

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.comcheckapp.MainActivity
import com.example.comcheckapp.databinding.ItemListComcheckBinding
import com.example.comcheckapp.model.DataItem
import com.pierfrancescosoffritti.androidyoutubeplayer.core.player.YouTubePlayer
import com.pierfrancescosoffritti.androidyoutubeplayer.core.player.listeners.AbstractYouTubePlayerListener
import com.pierfrancescosoffritti.androidyoutubeplayer.core.player.views.YouTubePlayerView


class ChannelAdapter(private val listChannel:List<DataItem>):RecyclerView.Adapter<ChannelAdapter.ViewHolder>() {


    interface AddLifecycleCallbackListener {
        fun addLifeCycleCallBack(youTubePlayerView: YouTubePlayerView)
    }
    class ViewHolder(private val binding:ItemListComcheckBinding):RecyclerView.ViewHolder(binding.root) {
            fun bind(dataItem: DataItem){
                binding.apply {
                    nameListStory.text = dataItem.channel
                    uploadedListStory.text = dataItem.linkKonten
                    (itemView.context as MainActivity).addLifeCycleCallBack(binding.idVideoYt)
                    binding.idVideoYt.addYouTubePlayerListener(object : AbstractYouTubePlayerListener(){
                        override fun onReady(youTubePlayer: YouTubePlayer) {
//                            val url = dataItem.linkKonten
//                            val urlSplit = url?.split("watch?v=")
                            val videoId = dataItem.linkKonten
                            youTubePlayer.loadVideo(videoId!!, 0f)
                        }
                    })

                }
            }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ChannelAdapter.ViewHolder {
       val binding = ItemListComcheckBinding.inflate(LayoutInflater.from(parent.context),parent,false)
        return ViewHolder(binding)
    }

    override fun onBindViewHolder(holder: ChannelAdapter.ViewHolder, position: Int) {
        holder.bind(listChannel[position])
    }

    override fun getItemCount(): Int  = listChannel.size


}

