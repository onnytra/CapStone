<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','phone','password'];
    protected $primaryKey = 'id_user';

    public function channelsosmed()
    {
        return $this->hasMany(channelsosmed::class, 'id_user');
    }
}
