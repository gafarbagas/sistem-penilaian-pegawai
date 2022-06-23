<html>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>id_site</th>
                    <th>nama_site</th>
                    <th>employee_id</th>
                    <th>nama_employee</th>
                    <th>grading</th>
                    <th>status</th>
                    <th>status_employee</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee as $employee)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $employee->id_site }}</td>
                    <td>{{ $employee->nama_site }}</td>
                    <td>{{ $employee->employee_id }}</td>
                    <td>{{ $employee->nama_employee }}</td>
                    <td>{{ $employee->grading }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->status_employee }}</td>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
