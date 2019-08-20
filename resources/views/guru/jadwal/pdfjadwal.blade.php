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
    <h3>Laporan guru</h3>
    <div class="container">
    <div class="card">
    <div class="card-body">

    <table border="0.5">
    @if(count($jadwal)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Guru</th>
                <th colspan="2">Mata Pelajaran</th>
                <th colspan="2">Hari</th>
                <th colspan="2">Waktu</th>
                <th colspan="2">Ruangan</th>
                <th colspan="2">Tahun Ajaran</th>
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($jadwal as $data)
        <tr>
        <td >{{$i}}</td>
        <td colspan="2">{{$data->nama}}</td>
        <td colspan="2">{{$data->mapel}}</td>
        <td colspan="2">{{$data->hari}}</td>
        <td colspan="2">{{$data->jam}}</td>
        <td colspan="2">{{$data->ruangan}}</td>
        <td colspan="2">{{$data->tahun_ajaran}}</td>
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