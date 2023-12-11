<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="{{ asset('vendor/enno/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            .ttd, .content-table, .header-table{
                width: 100%;
            }
            .ttd tr td{
                font-size: 10pt !important;
            }
            .content-table tr th{
                text-align: center;
            }
            .content-table tr th, .content-table tr td{
                font-size: 10pt !important;
                vertical-align: middle;
            }
            .content-table tr td:first-child { 
                text-align: center;
                width: 10px 
            }
        </style>
    </head>
    <body class="text-center header-table">
        <table style="width: 80%;" class="mx-5 mt-3">
            <tr>
                <th style="width: 10%;">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="" width="70" height="100">
                </th>
                <th style="width: auto; " class="text-center">
                    <h6>PEMERINTAHAN PROVINSI KALIMANTAN SELATAN</h6>
                    <h6>BADAN KEUANGAN DAERAH</h6>
                    <h6>UNIT PELAYANAN PENDAPATAN DAERAH</h6>
                    <h6>(UPPD) KANDANGAN</h6>
                </th>
            </tr>
        </table>
        <hr>
        <h6 class="text-center my-4">{{ $title }}</h6>
        <table class="table content-table">
            <tr>
                <th class="align-middle text-center">No</th>
                <th class="align-middle text-center">Nama</th>
                <th class="align-middle text-center">Email</th>
                @if ($type == "user")
                    <th class="align-middle text-center">Nomor Telepon</th> 
                @endif
                <th class="align-middle text-center">Tanggal<br>Pembuatan</th>
            </tr>
            @foreach ($accounts as $index => $data)
                <tr>
                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                    <td class="align-middle"> {{ $data->name }}</td>
                    <td class="align-middle text-left">
                        {{ $data->email }} <br>
                    </td>
                    @if ($type == "user")
                        <td class="align-middle">
                            {{ $data->phone }}
                        </td>
                    @endif
                    <td class="align-middle text-center">
                        {{ date('d-m-Y', strtotime($data->created_at)) }}
                    </td>
                </tr>
            @endforeach
        </table>

        <br>
        <br>
        <table style="width: 100%" class="ttd">
            <tr>
                <td style="width: 60%">

                </td>
                <td style="width: auto" class="text-center">
                    <p style="font-size: 10pt; font-weight: 700">Plt. Kepala UPPD SAMSAT Kandangan</p>
                    <br>
                    <br>
                    <p style="font-size: 10pt">
                        <span style="font-weight: 700">
                            R. M. ERNATO SURYA JAYA, SP, M.AP    
                        </span> <br>
                        NIP. 18691009 199803 1 009
                    </p>
                </td>
            </tr>
        </table>
    </body>
</html>