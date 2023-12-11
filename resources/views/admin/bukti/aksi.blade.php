@extends('templates.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pelanggar</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            @if (isset($bukti))
                                <h4>Edit Data Pelanggar</h4>
                            @else
                                <h4>Tambah Data Pelanggar</h4>
                            @endif

                        </div>
                        <form
                            action="@if (isset($bukti)) {{ route('admin.bukti.update', $bukti->id) }} @else {{ route('admin.bukti.store') }} @endif"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($bukti))
                                @method('PUT')
                            @endif

                            <div class="card-body px-4 py-0">
                                <div class="row">
                                    <div class="form-group col">
                                        <label><b>Nama barang Bukti</b></label>
                                        <input type="text" class="form-control" name="barang_bukti"
                                            placeholder="Masukkan Nama Lengkap" value="{{ $bukti->barang_bukti ?? '' }}">
                                    </div>
                                    <div class="form-group col">
                                        <label><b>Pilih Saksi</b></label>
                                        <select class="form-control selectric" name="id_saksi">
                                            <option value=""></option>
                                            @if (isset($bukti))
                                                @foreach ($saksi as $item)
                                                    <option value="{{ $item->id }}" {{ $bukti->id_saksi == $item->id ? 'selected' : '' }}>{{ $item->nama.' - '.$item->no_hp  }} </option>
                                                @endforeach
                                            @else
                                                @foreach ($saksi as $item)
                                                    <option value="{{$item->id }}">{{ $item->nama.' - '.$item->no_hp  }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label><b>File Bukti</b></label>
                                        <input type="file" class="form-control" name="file">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary px-3">
                                    @if (isset($bukti))
                                        Edit
                                    @else
                                        Simpan
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-extends')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(`[name="id_saksi"]`).select2({
                placeholder: "Pilih Nama Saksi",
                allowClear: true
            })
        })
    </script>
@endsection
