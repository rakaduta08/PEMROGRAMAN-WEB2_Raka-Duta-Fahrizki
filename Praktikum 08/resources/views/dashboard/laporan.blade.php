@php
    $title = "Laporan Program Studi";
    $tahun = 2024;
    $data_mhs = [
        ["prodi" => "SI", "jumlah" => 1020],
        ["prodi" => "TI", "jumlah" => 1215],
        ["prodi" => "BD", "jumlah" => 62],
    ]
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{$title}} </title>
</head>
<body>
    <h1> {{$title}} - Tahun {{$tahun}} </h1>
    <table border="1">
        <thead>
            <th>Program Studi</th>
            <th>Jumlah Mahasiswa</th>
        </thead>
        <tbody>
            @foreach ($data_mhs as $mhs)
                <tr>
                    <td> {{ $mhs['prodi']}} </td>
                    <td> {{$mhs['jumlah']}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
