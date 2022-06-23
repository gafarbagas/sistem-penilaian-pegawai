<html>
    <head>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="3">{{$start}} - {{$end}}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <th>No.</th>
                <th>ID Employee</th>
                <th>PC Name</th>
                <th>Trainer Name</th>
                <th>Produk Yang Diajarkan</th>
                <th>Nilai Pretest</th>
                <th>Nilai Post Test</th>
                <th>Training Date</th>
                <th>Input Date</th>
            </tr>
            
            @foreach($icss as $ics)
            <tr>
                <td>{{ ($loop->iteration) }}.</td>
                <td>{{ $ics->employee_id }}</td>
                <td>{{ $ics->nama_employee }}</td>
                <td>{{ $ics->trainer->nama_trainer }}</td>
                <td>{{ $ics->produk }}</td>
                <td>{{ $ics->nilaipre }}</td>
                <td>{{ $ics->nilaipost }}</td>
                <td>{{ Carbon\Carbon::parse($ics->tanggal)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($ics->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>