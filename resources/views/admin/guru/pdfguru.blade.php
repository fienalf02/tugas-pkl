<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
    }
    table#t01 tr:nth-child(even) {
        background-color: white;
    }
    table#t01 tr:nth-child(odd) {
        background-color: white;
    }
    table#t01 th {
        background-color: black;
        color: white;
    }
    h3 {
        text-align: center;
    }
</style>
</head>
<body>
    <h3>Laporan guru</h3>
    <div class="container">
    <div class="card">
    <div class="card-body">

    <table style="width:100%" id="t01">
    @if(count($gurus)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">NIP</th>
                <th colspan="2">Nama</th>
                <th colspan="2">Jenis Kelamin</th>
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($gurus as $g)
        <tr>
        <td >{{$i}}</td>
        <td colspan="2">{{$g->NIP}}</td>
        <td colspan="2">{{$g->nama_guru}}</td>
        <td colspan="2">{{$g->JK}}</td>
        </tr>
        <?php $i++; ?>
        @endforeach
        </tbody>
        @endif
    </table>
    </div>
    </div>
    </div>
</body>
</html>