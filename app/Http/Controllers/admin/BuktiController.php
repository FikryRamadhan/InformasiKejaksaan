<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bukti;
use App\Models\Saksi;
use  Illuminate\Http\Request;
class BuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukti = Bukti::all();
        return view('admin.bukti.index',[
            'title' => 'Manajemen Bukti',
            'menu' => 'bukti',
            'bukti' => $bukti
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bukti.aksi',[
            'title' => 'Manajemen Bukti',
            'menu' => 'bukti',
            'saksi' => Saksi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuktiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_saksi' => 'required',
            'barang_bukti' => 'required',
        ]);


        if($request->file('file')){
            $file = $request->file('file');
            $extension = explode('.', $file->getClientOriginalName())[1];
            $fileName = Bukti::count().'.'.$extension;
            $file->move(public_path('file_bukti'), $fileName);
            $last_path = 'file_bukti/'.$fileName;
        }

        Bukti::create([
            'id_saksi' => $request->id_saksi,
            'barang_bukti' => $request->barang_bukti,
            'file' => $last_path ?? null
        ]);

        return redirect('/admin/bukti')->with('success', 'Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function show(Bukti $bukti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function edit(Bukti $bukti)
    {
        return view('admin.bukti.aksi',[
            'title' => 'Manajemen Bukti',
            'menu' => 'bukti',
            'saksi' => Saksi::all(),
            'bukti' => $bukti
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuktiRequest  $request
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bukti $bukti)
    {
        $request->validate([
            'id_saksi' => 'required',
            'barang_bukti' => 'required',
        ]);

        if($request->file('file')){
            $file = $request->file('file');
            $extension = explode('.', $file->getClientOriginalName())[1];
            $fileName = Bukti::count().'.'.$extension;
            $file->move(public_path('file_bukti'), $fileName);
            $last_path = 'file_bukti/'.$fileName;
        }

        $bukti->update([
            'id_saksi' => $request->id_saksi,
            'barang_bukti' => $request->barang_bukti,
            'file' => $last_path ?? null
        ]);

        return redirect('/admin/bukti')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function delete(Bukti $bukti)
    {
        $bukti->delete();
        return redirect('/admin/bukti')->with('success', 'Data Berhasil Di Hapus');
    }
}
