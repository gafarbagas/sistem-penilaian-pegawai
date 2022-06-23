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
            
            @foreach($icps as $icp)
            <tr>
                <td>{{ ($loop->iteration) }}.</td>
                <td>{{ $icp->employee->employee_id }}</td>
                <td>{{ $icp->employee->nama_employee }}</td>
                <td>{{ $icp->trainer->nama_trainer }}</td>
                <td>{{ $icp->nilai1 }}</td>
                <td>{{ $icp->nilai2 }}</td>
                <td>{{ $icp->nilai3 }}</td>
                <td>{{ $icp->produk }}</td>
                <td>{{ $icp->nilaipre }}</td>
                <td>{{ $icp->nilaipost }}</td>
                <td>{{ Carbon\Carbon::parse($icp->tanggal)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($icp->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>