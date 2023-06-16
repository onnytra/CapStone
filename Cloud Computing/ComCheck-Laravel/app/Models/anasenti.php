<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anasenti extends Model
{
    use HasFactory;
    protected $fillable = ['sentimen', 'label','id_channel'];
    protected $primaryKey = 'id_anasenti';

    public function channelsosmed()
    {
        return $this->belongsTo(channelsosmed::class, 'id_channel');
    }
}
