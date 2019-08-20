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
    @if(count($mapel)>0)
        <thead>
            <tr>
                <th>No</th>
                <th colspan="2">Mata Pelajaran</th>
                <th colspan="2">KKM</th>
            </tr>
        </thead>

        <tbody>
        <?php $i=1; ?>
        @foreach($mapel as $data)
        <tr>
        <td >{{$i}}</td>
        <td colspan="2">{{$data->mapel}}</td>
        <td colspan="2">{{$data->KKM}}</td>
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