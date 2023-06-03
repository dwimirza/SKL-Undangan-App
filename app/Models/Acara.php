<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';
    protected $guarded = [];

    public function tamu()
    {
        return $this->belongsToMany(Tamu::class,'id_tamu');
    }
}
