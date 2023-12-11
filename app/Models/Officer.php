<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nip',
        'gender',
        'position',
        'phone',
        'address',
        'status'
    ];

    public static function totalPegawai(){
        return self::count();
    }
}
