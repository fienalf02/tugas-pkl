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
    <h3>Laporan Nilai</h3>
    <div class="container">
    <div class="card">
    <div class="card-body">

    <table border="0.5">
    @if(count($nilai)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Nama Siswa</th>
                <th colspan="2">Jadwal</th>
                <th colspan="2">Semester</th>
                <th colspan="2">Nilai Tugas</th>
                <th colspan="2">Nilai UTS</th>
                <th colspan="2">Nilai UAS</th>
                <th colspan="2">Nilai Rapot</th>
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($nilai as $data)
        <tr>
        <td >{{$i}}</td>
        <td colspan="2">{{$data->nama}}</td>
        <td colspan="2">{{$data->mapel}}</td>
        <td colspan="2">{{$data->semester}}</td>
        <td colspan="2">{{$data->tugas}}</td>
        <td colspan="2">{{$data->uts}}</td>
        <td colspan="2">{{$data->uas}}</td>
        <td colspan="2">{{$data->rapot}}</td>
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