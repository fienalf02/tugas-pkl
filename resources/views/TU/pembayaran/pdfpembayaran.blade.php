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
    p {
        text-align: right;
    }
    
</style>
</head>
    <table align="center">
    <tr>
    <td><img src="{{ ('assets/images/icon/logooo.png') }}" alt="logo" width="80", height="80"></td>
    <td><center>
        <font size="5">KWITANSI PEMBAYARAN</font><br>
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
        <tr>
            <td>NIS</td>
            <td>   : {{ $detail_siswa->NIS}}</td>
            <td>Kelas</td>
            <td>   : {{ $detail_siswa->jurusan}} {{ $detail_siswa->urutan}}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>   : {{ $detail_siswa->nama}}</td>
            <td>Wali Kelas</td>
            <td>   : {{ $detail_siswa->nama_guru}}</td>
        </tr>
    </table>

    <table style="width:100%" id="t01">
    @if(!empty($pembayaran)>0)
        <thead>
            <tr>
                <th colspan="2">Bulan</th>
                <th colspan="2">Jatuh Tempo</th>   
                <th colspan="2">Tanggal Bayar</th>
                <th colspan="2">Jumlah</th>
                <th colspan="2">Keterangan</th> 
            </tr>
        </thead>

        <tbody>
        @foreach($pembayaran as $data)
        <tr>
        <td colspan="2">{{$data->bulan}}</td>
        <td colspan="2">{{$data->jatuh_tempo}}</td>
        <td colspan="2">{{$data->tgl_bayar}}</td>
        <td colspan="2">{{$data->jumlah}}</td>
        <td colspan="2">{{$data->keterangan}}</td>
        </tr>
        </tbody>
        <br><br>
    </table>
        <p>.............., {{$data->tgl_bayar}}</p>
        <br><br><br>
        <p>Operator</p>
        @endforeach
        @endif
    </div>
    </div>
    </div>
</body>
</html>