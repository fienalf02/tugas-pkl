<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
</head>
<body>
    <h3>Laporan Pembayaran</h3>
    <div class="container">
    <div class="card">
    <div class="card-body">

    <table border="0.5">
    @if(!empty($pembayaran)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Bulan</th>
                <th colspan="2">Jatuh Tempo</th>   
                <th colspan="2">Tanggal Bayar</th>    
                <th colspan="2">Nomor Bayar</th>
                <th colspan="2">Jumlah</th>
                <th colspan="2">Keterangan</th> 
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($pembayaran as $data)
        <tr>
        <td >{{$i}}</td>
        <td colspan="2">{{$data->bulan}}</td>
        <td colspan="2">{{$data->jatuh_tempo}}</td>
        <td colspan="2">{{$data->tgl_bayar}}</td>
        <td colspan="2">{{$data->nomor}}</td>
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