<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BalikNama;
use App\Models\Duplikat;
use App\Models\Mutasi;
use App\Models\Pajak;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.index',[
            'title' => 'Halaman Dashboard Admin',
            'menu' => 'home',
        ]);
    }
}
