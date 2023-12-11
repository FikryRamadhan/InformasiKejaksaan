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
                            @if (isset($pelanggar))
                                <h4>Edit Data Pelanggar</h4>
                            @else
                                <h4>Tambah Data Pelanggar</h4>
                            @endif

                        </div>
                        <form
                            action="@if (isset($pelanggar)) {{ route('admin.pelanggar.update', $pelanggar->id) }} @else {{ route('admin.pelanggar.store') }} @endif"
                            method="POST">
                            @csrf
                            @if (isset($pelanggar))
                                @method('PUT')
                            @endif

                            <div class="card-body px-4 py-0">
                                <div class="row">
                                    <div class="form-group col">
                                        <label><b>Nama</b></label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Masukkan Nama Lengkap" value="{{ $pelanggar->nama ?? '' }}">
                                    </div>
                                    <div class="form-group col">
                                        <label><b>NIP</b></label>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP"
                                            value="{{ $pelanggar->nip ?? '' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label><b>Masa Tahanan</b></label>
                                        <input type="number" class="form-control" name="masa_tahanan"
                                            placeholder="Masukkan Masa Tahanan"
                                            value="{{ $pelanggar->masa_tahanan ?? '' }}">
                                    </div>
                                    <div class="form-group col">
                                        <label><b>Tindakan</b></label>
                                        <select class="form-control selectric" name="id_kriminal">
                                            <option value=""></option>
                                            @if (isset($pelanggar))
                                                @foreach ($kriminal as $item)
                                                    <option value="{{ $item->id }}" {{ $pelanggar->id_kriminal == $item->id ? 'selected' : '' }}>{{ $item->kriminal_name }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($kriminal as $item)
                                                    <option value="{{$item->id }}">{{ $item->kriminal_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label><b>Alamat</b></label>
                                    <textarea type="text" class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat">{{ $pelanggar->alamat ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary px-3">
                                    @if (isset($pelanggar))
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
            $(`[name="id_kriminal"]`).select2({
                placeholder: "Pilih Tindakan Kriminal",
                allowClear: true
            })
        })
    </script>
@endsection
