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
                <th>Selling Skill 1</th>
                <th>Selling Skill 2</th>
                <th>Selling Skill 3</th>
                <th>Produk Yang Diajarkan</th>
                <th>Nilai Pretest</th>
                <th>Nilai Post Test</th>
                <th>Training Date</th>
                <th>Input Date</th>
            </tr>
            
            @foreach($iclls as $icll)
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $icll->employee_id }}</td>
                <td>{{ $icll->nama_employee }}</td>
                <td>{{ $icll->trainer->nama_trainer }}</td>
                <td>{{ $icll->nilai1 }}</td>
                <td>{{ $icll->nilai2 }}</td>
                <td>{{ $icll->nilai3 }}</td>
                <td>{{ $icll->produk }}</td>
                <td>{{ $icll->nilaipre }}</td>
                <td>{{ $icll->nilaipost }}</td>
                <td>{{ Carbon\Carbon::parse($icll->tanggal)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($icll->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>