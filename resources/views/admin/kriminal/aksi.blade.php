@extends('templates.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kriminal</h1>
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
                            @if (isset($kriminal))
                                <h4>Edit Data Jenis Kriminal</h4>
                            @else
                                <h4>Tambah Data Jenis Kriminal</h4>
                            @endif

                        </div>
                        <form
                            action="@if (isset($kriminal)) {{ route('admin.kriminal.update', $kriminal->id) }} @else {{ route('admin.kriminal.store') }} @endif"
                            method="POST">
                            @csrf
                            @if (isset($kriminal))
                                @method('PUT')
                            @endif

                            <div class="card-body px-4 py-0">
                                <div class="form-group col">
                                    <label><b>Nama</b></label>
                                    <input type="text" class="form-control" name="kriminal_name"
                                        placeholder="Masukkan Jenis Kriminal" value="{{ $kriminal->kriminal_name ?? '' }}">
                                </div>
                                <div class="form-group col">
                                    <label><b>Alamat</b></label>
                                    <textarea type="text" class="form-control" rows="3" name="description" placeholder="Masukkan Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary px-3">
                                    @if (isset($kriminal))
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
@endsection
