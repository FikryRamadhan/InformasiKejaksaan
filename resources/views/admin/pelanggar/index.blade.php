@extends('templates.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Pelanggar</h1>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Pengajuan Mutasi STNK</h2>
      <p class="section-lead">......</p> --}}

            <div class="row">
                <div class="col-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Pelanggar Kasus Kriminal</h4>
                            <div class="card-header-form">
                                <a href="{{ route('admin.pelanggar.create') }}" class="btn btn-primary mr-2">
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive px-4 pb-4 mt-3">
                                <table class="table table-bordered" id="datatables">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 20px">No.</th>
                                            <th class="text-center" style="width: 20px">Aksi</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Nip</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Masa Tahanan</th>
                                            <th class="text-center">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($pelanggar) > 0)
                                            @foreach ($pelanggar as $index => $data)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                    <td class="text-center align-middle">
                                                        <div class="btn-group dropright px-0 pr-2">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton2" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-cog"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropright">
                                                                <a class="dropdown-item has-icon"
                                                                    href="{{ route('admin.pelanggar.edit', $data->id) }}">
                                                                    Edit
                                                                </a>
                                                                <form
                                                                    action="{{ route('admin.pelanggar.delete', $data->id) }}"
                                                                    id="delete-form-{{ $index }}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf

                                                                    <a class="dropdown-item has-icon"
                                                                        href="{{ route('admin.pelanggar.delete', $data->id) }}"
                                                                        id="btn-delete-{{ $index }}">
                                                                        Hapus
                                                                    </a>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $data->nama }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $data->nip }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $data->alamat }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $data->masa_tahanan }} Tahun
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $data->kriminal->kriminal_name }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="11" class="text-center">
                                                    Data Pelanggar Masih Kosong!
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-extends')
    <script>
        const table = document.getElementById('datatables');
        for (var i = 0; i < (table.rows.length - 1); i++) {
            var btnConfirmation = document.getElementById(`btn-delete-${i}`);
            if (btnConfirmation) {
                btnConfirmation.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    }).fire({
                        title: 'Konfirmasi Hapus?',
                        text: "Yakin ingin Menghapus Data Karyawan?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            var dataId = event.target.id.split('-')[2];
                            document.getElementById(`delete-form-${dataId}`).submit();
                        }
                    });
                });
            }
        }
    </script>
@endsection
