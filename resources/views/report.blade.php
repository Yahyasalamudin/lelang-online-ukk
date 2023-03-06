<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Lelang</title>
    <style>
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .title,
        .tanggal {
            text-align: center;
            font-family: sans-serif;
        }

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 13px;
            text-align: center;
            text-transform: capitalize;
        }

        /*
        #table tr:nth-child(even) {
            background-color: #f9f8f8;
        } */

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            background-color: #558595;
            color: white;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <table width="500" border="0">
        <tr>
            <td class="title">
                Laporan Lelang
                <br>
                Tanggal :
                @foreach ($detaild as $h)
                    {{ date('d F Y, H:i', strtotime($h->tgl_lelang)) }}
                @endforeach
            </td>
        </tr>
    </table>
    <br><br>
    <table id="table">
        <tr>
            <th>Nama</th>
            <th>No HP</th>
            <th>Penawaran Harga</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            {{-- <th>Harga Akhir</th> --}}
            <th>Tanggal Lelang</th>
            <th>Status Pemenang</th>
        </tr>
        @foreach ($historyd as $h)
            <tr>
                <td> {{ $h->nama }} </td>
                <td> {{ $h->no_hp }} </td>
                <td> Rp.{{ number_format($h->penawaran_harga) }} </td>
                <td> {{ $h->nama_barang }} </td>
                <td> Rp.{{ number_format($h->harga_awal) }} </td>
                {{-- <td> Rp.{{ number_format($h->harga_akhir) }} </td> --}}
                <td> {{ date('d, F Y', strtotime($h->tgl_lelang)) }} </td>
                <td> {{ $h->status_pemenang }} </td>
            </tr>
        @endforeach
    </table>

</body>



</html>
