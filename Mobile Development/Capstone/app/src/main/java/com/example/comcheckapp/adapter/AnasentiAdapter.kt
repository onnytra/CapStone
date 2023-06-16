package com.example.comcheckapp.adapter

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.comcheckapp.databinding.ItemAnalisisSentimenBinding
import com.example.comcheckapp.model.DataItemAnasenti

class AnasentiAdapter(private val listAnasenti:List<DataItemAnasenti>):RecyclerView.Adapter<AnasentiAdapter.ViewHolder>() {


    class ViewHolder(private val binding:ItemAnalisisSentimenBinding):RecyclerView.ViewHolder(binding.root) {
        fun bind(anasenti:DataItemAnasenti){
            binding.apply {
                tvChannel.text = anasenti.idChannel.toString()
                tvLabel.text = anasenti.label
                tvSentimen.text = anasenti.sentimen

            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): AnasentiAdapter.ViewHolder {
        val binding = ItemAnalisisSentimenBinding.inflate(LayoutInflater.from(parent.context),parent,false)
        return ViewHolder(binding)

    }

    override fun onBindViewHolder(holder: AnasentiAdapter.ViewHolder, position: Int) {
        holder.bind(listAnasenti[position])
    }

    override fun getItemCount(): Int  = listAnasenti.size
}