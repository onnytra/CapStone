package com.example.comcheckapp.model

import com.google.gson.annotations.SerializedName

data class ResponsePostChannel(

	@field:SerializedName("data")
	val data: Data,

	@field:SerializedName("success")
	val success: Boolean,

	@field:SerializedName("message")
	val message: String
)

data class Data(

	@field:SerializedName("updated_at")
	val updatedAt: String,

	@field:SerializedName("channel")
	val channel: String,

	@field:SerializedName("created_at")
	val createdAt: String,

	@field:SerializedName("id_channel")
	val idChannel: Int,

	@field:SerializedName("id_user")
	val idUser: String,

	@field:SerializedName("link_konten")
	val linkKonten: String
)
