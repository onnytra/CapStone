<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channelsosmed extends Model
{
    use HasFactory;
    protected $fillable = ['channel', 'link_konten','id_user'];
    protected $primaryKey = 'id_channel';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function anasenti()
    {
        return $this->hasMany(anasenti::class, 'id_channel');
    }
}
