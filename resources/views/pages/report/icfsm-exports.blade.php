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
                <th>PC Name</th>
                <th>Trainer Name</th>
                <th>Email</th>
                <th>No. Handphone</th>
                <th>Status FSM</th>
                <th>Jabatan FSM</th>
                <th>Account Grop</th>
                <th>Nama Toko</th>
                <th>FSM Category</th>
                <th>Kota</th>
                <th>Produk Yang Diajarkan</th>
                <th>Nilai Pretest</th>
                <th>Nilai Post Test</th>
                <th>Training Date</th>
                <th>Input Date</th>
            </tr>
            
            @foreach($icfsms as $icfsm)
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>{{ $icfsm->nama_employee }}</td>
                <td>{{ $icfsm->trainer->nama_trainer }}</td>
                <td>{{ $icfsm->email }}</td>
                <td>{{ $icfsm->nohp }}</td>
                <td>{{ $icfsm->status }}</td>
                <td>{{ $icfsm->jabatan }}</td>
                <td>{{ $icfsm->account }}</td>
                <td>{{ $icfsm->nama_toko }}</td>
                <td>{{ $icfsm->category }}</td>
                <td>{{ $icfsm->kota }}</td>
                <td>{{ $icfsm->produk }}</td>
                <td>{{ $icfsm->nilaipre }}</td>
                <td>{{ $icfsm->nilaipost }}</td>
                <td>{{ Carbon\Carbon::parse($icfsm->tanggal)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($icfsm->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>