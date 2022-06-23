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
                <th>Instore Ke</th>
                <th>Jenis Instore</th>
                <th>Produk Yang Diajarkan</th>
                <th>Jenis Produk</th>
                <th>Tipe Produk</th>
                <th>Issue</th>
                <th>Selling Skill 1</th>
                <th>Selling Skill 2</th>
                <th>Selling Skill 3</th>
                <th>Selling Skill 4</th>
                <th>Selling Skill 5</th>
                <th>Selling Skill 6</th>
                <th>Selling Skill 7</th>
                <th>Selling Skill 8</th>
                <th>Selling Skill 9</th>
                <th>Selling Skill 10</th>
                <th>Product Knowledge 1</th>
                <th>Product Knowledge 2</th>
                <th>Product Knowledge 3</th>
                <th>Product Knowledge 4</th>
                <th>Product Knowledge 5</th>
                <th>Market Knowledge 1</th>
                <th>Market Knowledge 2</th>
                <th>Market Knowledge 3</th>
                <th>Market Knowledge 4</th>
                <th>Market Knowledge 5</th>
                <th>Avg Selling Skill</th>
                <th>Avg Product Knowledge</th>
                <th>Avg Market Knowledge</th>
                <th>Average Score</th>
                <th>Training Date</th>
                <th>Input Date</th>
            </tr>

            @foreach($isps as $isp)
            <tr>
                <td>{{ ($loop->iteration) }}.</td>
                <td>{{ $isp->employee->employee_id }}</td>
                <td>{{ $isp->employee->nama_employee }}</td>
                <td>{{ $isp->trainer->nama_trainer }}</td>
                <td>{{ $isp->instore }}</td>
                <td>{{ $isp->jenis }}</td>
                <td>{{ $isp->produk }}</td>
                <td>{{ $isp->jenis_ajar }}</td>
                <td>{{ $isp->tipe_produk }}</td>
                <td>{{ $isp->issue }}</td>
                <td>{{ $isp->nilai_selling1 }}</td>
                <td>{{ $isp->nilai_selling2 }}</td>
                <td>{{ $isp->nilai_selling3 }}</td>
                <td>{{ $isp->nilai_selling4 }}</td>
                <td>{{ $isp->nilai_selling5 }}</td>
                <td>{{ $isp->nilai_selling6 }}</td>
                <td>{{ $isp->nilai_selling7 }}</td>
                <td>{{ $isp->nilai_selling8 }}</td>
                <td>{{ $isp->nilai_selling9 }}</td>
                <td>{{ $isp->nilai_selling10 }}</td>
                <td>{{ $isp->nilai_produk1 }}</td>
                <td>{{ $isp->nilai_produk2 }}</td>
                <td>{{ $isp->nilai_produk3 }}</td>
                <td>{{ $isp->nilai_produk4 }}</td>
                <td>{{ $isp->nilai_produk5 }}</td>
                <td>{{ $isp->nilai_knowledge1 }}</td>
                <td>{{ $isp->nilai_knowledge2 }}</td>
                <td>{{ $isp->nilai_knowledge3 }}</td>
                <td>{{ $isp->nilai_knowledge4 }}</td>
                <td>{{ $isp->nilai_knowledge5 }}</td>
                <td>
                    @php
                        $hasil = ($isp->nilai_selling1 + $isp->nilai_selling2 + $isp->nilai_selling3 + $isp->nilai_selling4 + $isp->nilai_selling5 + $isp->nilai_selling6 + $isp->nilai_selling7 + $isp->nilai_selling8 + $isp->nilai_selling9 + $isp->nilai_selling10) / 10;
                        echo $hasil;
                    @endphp
                </td>
                <td>
                    @php
                        $hasil = ($isp->nilai_produk1 + $isp->nilai_produk2 + $isp->nilai_produk3 + $isp->nilai_produk4 + $isp->nilai_produk5) / 5;
                        echo $hasil;
                    @endphp
                </td>
                <td>
                    @php
                        $hasil = ($isp->nilai_knowledge1 + $isp->nilai_knowledge2 + $isp->nilai_knowledge3 +
                        $isp->nilai_knowledge4 + $isp->nilai_knowledge5) / 5;
                        echo $hasil;
                    @endphp
                </td>
                <td>
                    @php
                        $sellingSkill = ($isp->nilai_selling1 + $isp->nilai_selling2 + $isp->nilai_selling3 + $isp->nilai_selling4 + $isp->nilai_selling5 + $isp->nilai_selling6 + $isp->nilai_selling7 + $isp->nilai_selling8 + $isp->nilai_selling9 + $isp->nilai_selling10) / 10;

                        $productKnowledge = ($isp->nilai_produk1 + $isp->nilai_produk2 + $isp->nilai_produk3 + $isp->nilai_produk4 + $isp->nilai_produk5) / 5;

                        $marketKnowledge = ($isp->nilai_knowledge1 + $isp->nilai_knowledge2 + $isp->nilai_knowledge3 + $isp->nilai_knowledge4 + $isp->nilai_knowledge5) / 5;

                        $total = ($sellingSkill + $productKnowledge + $marketKnowledge) / 3;
                        echo round($total);
                    @endphp
                </td>
                <td>{{ Carbon\Carbon::parse($isp->tanggal)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($isp->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>