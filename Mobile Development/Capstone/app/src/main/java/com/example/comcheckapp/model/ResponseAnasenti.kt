package com.example.comcheckapp.model

import com.google.gson.annotations.SerializedName

data class ResponseAnasenti(

	@field:SerializedName("data")
	val data: List<DataItemAnasenti>,

	@field:SerializedName("success")
	val success: Boolean,

	@field:SerializedName("message")
	val message: String
)

data class DataItemAnasenti(

	@field:SerializedName("sentimen")
	val sentimen: String,

	@field:SerializedName("updated_at")
	val updatedAt: String,

	@field:SerializedName("created_at")
	val createdAt: String,

	@field:SerializedName("id_channel")
	val idChannel: Int,

	@field:SerializedName("label")
	val label: String,

	@field:SerializedName("id_anasenti")
	val idAnasenti: Int
)
