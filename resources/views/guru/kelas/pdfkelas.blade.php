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
    @if(count($kelas)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Kelas</th>
                <th colspan="2">Jurusan</th>
                <th colspan="2">Urutan</th> 
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($kelas as $data)
        <tr>
        <td >{{$i}}</td>
        <td colspan="2">{{$data->kelas}}</td>
        <td colspan="2">{{$data->jurusan}}</td>
        <td colspan="2">{{$data->urutan}}</td>
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