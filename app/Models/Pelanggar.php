<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggar extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function kriminal(){
        return $this->belongsTo(Kriminal::class, 'id_kriminal', 'id');
    }

    public function saksi(){
        return $this->belongsTo(Saksi::class, 'id_pelanggar', 'id');
    }
}
