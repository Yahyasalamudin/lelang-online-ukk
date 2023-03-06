{{-- <!DOCTYPE html>
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
            </td>
        </tr>
    </table>
    <br><br>
    <table id="table">
        <tr>
            <th>Nama</th>
            <th>No HP</th>
            <th>Nama Barang</th>
            <th>Harga Awal</th>
            <th>Harga Akhir</th>
            <th>Tanggal Lelang</th>
        </tr>
        <tr>
            <td> {{ $detail->nama }} </td>
            <td> {{ $detail->no_hp }} </td>
            <td> {{ $detail->nama_barang }} </td>
            <td> Rp.{{ number_format($detail->harga_awal) }} </td>
            <td> Rp.{{ number_format($detail->harga_akhir) }} </td>
            <td> {{ date('d, F Y', strtotime($detail->tgl_lelang)) }} </td>
        </tr>
    </table>

</body>



</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pemenang</title>

    <style>
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

        }

        #table tr:nth-child(even) {
            background-color: #f9f8f8;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #558595;
            color: white;
            font-size: 13px;
        }

        h2,
        h5 {
            text-align: center;
            letter-spacing: 1.5px;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        h4 {
            text-align: center;
        }

        hr {
            border: 0;
            border-top: 2px solid black;
        }
    </style>
</head>

<body class="body">

    <h2> Bukti Pemenang Lelang</h2>
    <h2>SMK Negeri 8 Jember</h2>
    <h5>Jl. Pelita no 27 Sidomekar - Semboro - Jember
        Jawa Timur, Indonesia</h5>
    <hr>

    <h4>Bukti Pemenang</h4>

    <table>
        <tr>
            <td width="80">Nama :</td>
            <td width="240">{{ $detail->nama }}</td>
            <td width="80">Barang :</td>
            <td>{{ $detail->nama_barang }}</td>

        </tr>
        <br>
        <tr>
            <td width="80">Nomer HP :</td>
            <td width="240">{{ $detail->no_hp }}</td>
            <td width="80">Tanggal :</td>
            <td>{{ date('d, F Y', strtotime($detail->tgl_lelang)) }}</td>
        </tr>
        <br>
        <tr>
            <td width="80">Harga Awal :</td>
            <td width="240">Rp.{{ number_format($detail->harga_awal) }}</td>
            <td width="80">Harga Akhir :</td>
            <td>Rp.{{ number_format($detail->harga_akhir) }}</td>
        </tr>
    </table>
    <br>
    <hr>
    <table>
        <tr>
            <td width="80"></td>
            <td width="240"></td>

        </tr>
        <tr>
            <td width="80"></td>
            <td width="240"></td>
            <td width="80"></td>
            <td>Pemenang</td>
            <td></td>
        </tr>
        <br><br><br>
        <tr>
            <td width="80"></td>
            <td width="240"></td>
            <td width="80"></td>
            <td>{{ $detail->nama }}</td>
        </tr>
    </table>
</body>

</html>
