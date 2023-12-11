<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggar;
use Illuminate\Http\Request;
use App\Models\Kriminal;

class PelanggarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggar = Pelanggar::all();
        return view('admin.pelanggar.index',[
            'title' => 'Manajemen Pelanggaran',
            'menu' => 'pelanggar',
            'pelanggar' => $pelanggar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriminal = Kriminal::all();
        return view('admin.pelanggar.aksi',[
            'title' => 'Tambah Data Pelanggar',
            'menu' => 'pelanggar',
            'kriminal' => $kriminal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelanggarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'masa_tahanan' => 'required',
            'id_kriminal' => 'required',
            'alamat' => 'required'
        ]);
        Pelanggar::create([
            'nama' => $request->name,
            'nip' => $request->nip,
            'masa_tahanan' => $request->masa_tahanan,
            'id_kriminal' => $request->id_kriminal,
            'alamat' => $request->alamat
        ]);

        return redirect(route('admin.pelanggar.index'))->with('success', 'Berhasil Menambahkan Data Pelanggar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggar  $pelanggar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggar $pelanggar)
    {
        $kriminal = Kriminal::all();
        return view('admin.pelanggar.aksi',[
            'title' => 'Edit Data Pelanggar',
            'menu' => 'pelanggar',
            'kriminal' => $kriminal,
            'pelanggar' => $pelanggar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelanggarRequest  $request
     * @param  \App\Models\Pelanggar  $pelanggar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggar $pelanggar)
    {
        $pelanggar->update([
            'nama' => $request->name,
            'nip' => $request->nip,
            'masa_tahanan' => $request->masa_tahanan,
            'id_kriminal' => $request->id_kriminal,
            'alamat' => $request->alamat
        ]);

        return redirect(route('admin.pelanggar.index'))->with('success', 'Berhasil Mengedit Data Pelanggar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggar  $pelanggar
     * @return \Illuminate\Http\Response
     */
    public function delete(Pelanggar $pelanggar)
    {
        $pelanggar->delete();
        return redirect(route('admin.pelanggar.index'))->with('success', 'Berhasil Menghapus Data Pelanggar');
    }
}
