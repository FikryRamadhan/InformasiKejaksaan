<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggar;
use App\Models\Saksi;
use Illuminate\Http\Request;

class SaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saksi = Saksi::all();
        return view('admin.saksi.index',[
            'title' => 'Manajemen Saksi',
            'menu' => 'saksi',
            'saksi' => $saksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggar = Pelanggar::all();
        return view('admin.saksi.aksi',[
            'title' => 'Manajemen Saksi',
            'menu' => 'saksi',
            'pelanggar' => $pelanggar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'id_pelanggar' => 'required',
        ]);
        Saksi::create([
            'nama' => $request->name,
            'no_hp' => $request->no_hp,
            'id_pelanggar' => $request->id_pelanggar,
            'alamat' => $request->alamat
        ]);

        return redirect('/admin/saksi')->with('success', 'Data Berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Saksi $saksi)
    {
        $pelanggar = Pelanggar::all();
        return view('admin.saksi.aksi',[
            'title' => 'Manajemen Saksi',
            'menu' => 'saksi',
            'saksi' => $saksi,
            'pelanggar' => $pelanggar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaksiRequest  $request
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saksi $saksi)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'id_pelanggar' => 'required',
        ]);

        $saksi->update([
            'nama' => $request->name,
            'no_hp' => $request->no_hp,
            'id_pelanggar' => $request->id_pelanggar,
            'alamat' => $request->alamat
        ]);

        return redirect('/admin/saksi')->with('success', 'Data Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saksi  $saksi
     * @return \Illuminate\Http\Response
     */
    public function delete(Saksi $saksi)
    {
        $saksi->delete();
        return redirect('/admin/saksi')->with('success', 'Data Berhasil Di Hapus');
    }
}
