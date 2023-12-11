<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kriminal;
use Illuminate\Http\Request;

class KriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriminal = Kriminal::all();
        return view('admin.kriminal.index',[
            'title' => 'Manajemen Kriminal',
            'menu' => 'kriminal',
            'kriminal' => $kriminal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kriminal.aksi',[
            'title' => 'Manajemen Kriminal',
            'menu' => 'kriminal'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKriminalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kriminal_name' => 'required',
            'description' => 'required',
        ]);
        Kriminal::create([
            'kriminal_name' => $request->kriminal_name,
            'description' => $request->description,
        ]);
        
        return redirect('/admin/kriminal')->with('success', 'Data Berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriminal  $kriminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriminal $kriminal)
    {
        return view('admin.kriminal.aksi',[
            'title' => 'Manajemen Kriminal',
            'menu' => 'kriminal',
            'kriminal' => $kriminal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKriminalRequest  $request
     * @param  \App\Models\Kriminal  $kriminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriminal $kriminal)
    {
        $request->validate([
            'kriminal_name' => 'required',
            'description' => 'required',
        ]);
        $kriminal->update($request->all());
        return redirect('/admin/kriminal')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriminal  $kriminal
     * @return \Illuminate\Http\Response
     */
    public function delete(Kriminal $kriminal)
    {
        $kriminal->delete();
        return redirect('/admin/kriminal')->with('success', 'Data Berhasil Di Hapus');
    }
}
