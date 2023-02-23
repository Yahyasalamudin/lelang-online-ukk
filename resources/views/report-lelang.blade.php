<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
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

        .margin {
            margin-top: 10px;
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
            </td>
        </tr>
    </table>
    <table class="margin" width="500" border="0">
        <tr>
            <td class="tanggal">
                Dari tanggal <b>{{ date('d, F Y', strtotime($tgl_awal)) }}</b> Sampai Tanggal
                <b>{{ date('d, F Y', strtotime($tgl_akhir)) }}</b>
            </td>
        </tr>
    </table>
    <br><br>
    <table id="table">
        <tr>
            <th>No</th>
            <th>Nama Pemenang</th>
            <th>No HP</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Tanggal Lelang</th>
        </tr>
        <?php $no = 1; ?>
        @foreach ($data as $d)
            <tr>
                <td>{{ $no++ }}</td>
                <td> {{ $d->nama }} </td>
                <td> {{ $d->no_hp }} </td>
                <td> {{ $d->nama_barang }} </td>
                <td> Rp.{{ number_format($d->harga_awal) }} </td>
                <td> Rp.{{ number_format($d->harga_akhir) }} </td>
                <td> {{ date('d, F Y', strtotime($d->tgl_lelang)) }} </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
