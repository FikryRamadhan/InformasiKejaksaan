<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function saksi(){
        return $this->belongsTo(Saksi::class, 'id_saksi', 'id');
    }
}
