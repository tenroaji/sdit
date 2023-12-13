<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF</title>
</head>

<body>
    <!-- Isi PDF disini -->
    <h1>Data untuk Cetak PDF</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal Bayar</th>
                <!-- Tambahkan field lainnya sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($queryResult as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->tanggal_bayar }}</td>
                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</body>

</html>

</html>
