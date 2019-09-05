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
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
    }
    table#t01 tr:nth-child(even) {
        background-color: white;
        border: 1px solid black;
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
    <table align="center">
    <tr>
    <td><img src="{{ ('assets/images/icon/logooo.png') }}" alt="logo" width="80", height="80"></td>
    <td><center>
        <font size="5">LAPORAN DATA PEMBAYARAN</font><br>
        <font size="6"><b>SMK NEGERI 1 SUNGAILIAT</b></font><br>
        <font size="3"><i>Jalan Singayudha 1, Sungailiat-Prov. Bangka Belitung telp. (0717) 92269</i></font>
    </td>
    </tr>
    <tr>
        <td colspan="2"><hr> </td>
    </tr>
    </table>
<body>
    <div class="container">
    <div class="card">
    <div class="card-body">
    
    <table style="width:100%" id="t01">
    @if(!empty($pembayaran)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Nama</th>
                <th colspan="2">Kelas</th>
                <th colspan="2">Bulan</th>
                <th colspan="2">Jumlah</th>
                <th colspan="2">Keterangan</th> 
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($pembayaran as $data)
        <tr>
        <td>{{$i}}</td>
        <td colspan="2">{{$data->nama}}</td>
        <td colspan="2">{{$data->kelas}} {{$data->jurusan}} {{$data->urutan}}</td>
        <td colspan="2">{{$data->bulan}}</td>
        <td colspan="2">{{$data->jumlah}}</td>
        <td colspan="2">{{$data->keterangan}}</td>
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