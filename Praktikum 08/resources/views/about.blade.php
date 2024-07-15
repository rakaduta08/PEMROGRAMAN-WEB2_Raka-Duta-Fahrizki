@php
    $nama = "Risca Marcella Jhesica";
    $nim = "0110123010";
    $prodi = "Sistem Informasi";
    $angkatan = 2023;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
</head>
<body>
    <h3>Nama Saya {{ $nama }}, NIM saya {{$nim}},
        Prodi saya {{$prodi}}, saya angkatan {{ $angkatan }} </h3>
</body>
</html>
