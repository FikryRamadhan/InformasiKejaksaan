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
                            @if (isset($saksi))
                                <h4>Edit Data Saksi</h4>
                            @else
                                <h4>Tambah Data Saksi</h4>
                            @endif

                        </div>
                        <form
                            action="@if (isset($saksi)) {{ route('admin.saksi.update', $saksi->id) }} @else {{ route('admin.saksi.store') }} @endif"
                            method="POST">
                            @csrf
                            @if (isset($saksi))
                                @method('PUT')
                            @endif

                            <div class="card-body px-4 py-0">
                                <div class="row">
                                    <div class="form-group col">
                                        <label><b>Nama Saksi</b></label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Masukkan Nama Lengkap Saksi" value="{{ $saksi->nama ?? '' }}">
                                    </div>
                                    <div class="form-group col">
                                        <label><b>Nama Pelanggar</b></label>
                                        <select class="form-control selectric" name="id_pelanggar">
                                            <option value=""></option>
                                            @if (isset($saksi))
                                                @foreach ($pelanggar as $item)
                                                    <option value="{{ $item->id }}" {{ $saksi->id_pelanggar == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($pelanggar as $item)
                                                    <option value="{{$item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label><b>No.Hp</b></label>
                                        <input type="number" class="form-control" name="no_hp"
                                            placeholder="Masukkan No Hp Saksi"
                                            value="{{ $saksi->no_hp ?? '' }}">
                                    </div>
                                    <div class="form-group col">
                                        <label><b>Alamat</b></label>
                                        <textarea type="text" class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat">{{ $saksi->alamat ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary px-3">
                                    @if (isset($saksi))
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
            $(`[name="id_pelanggar"]`).select2({
                placeholder: "Pilih Nama Pelanggar",
                allowClear: true
            })
        })
    </script>
@endsection
