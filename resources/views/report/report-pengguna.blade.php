<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
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
                Data Pengguna
            </td>
        </tr>
    </table>
    <br><br>
    <table id="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomer HP</th>
            <th>Username</th>
        </tr>
        <?php $no = 1; ?>
        @foreach ($user as $u)
            <tr>
                <td>{{ $no++ }}</td>
                <td> {{ $u->nama }} </td>
                <td> {{ $u->no_hp }} </td>
                <td> {{ $u->username }} </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
