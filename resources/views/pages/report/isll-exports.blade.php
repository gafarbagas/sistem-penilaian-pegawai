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
            
            @foreach($islls as $isll)
            <tr>
                <td>{{ ($loop->iteration) }}.</td>
                <td>{{ $isll->employee_id }}</td>
                <td>{{ $isll->nama_employee }}</td>
                <td>{{ $isll->trainer->nama_trainer }}</td>
                <td>{{ $isll->instore }}</td>
                <td>{{ $isll->jenis }}</td>
                <td>{{ $isll->produk }}</td>
                <td>{{ $isll->jenis_ajar }}</td>
                <td>{{ $isll->tipe_produk }}</td>
                <td>{{ $isll->issue }}</td>
                <td>{{ $isll->nilai_selling1 }}</td>
                <td>{{ $isll->nilai_selling2 }}</td>
                <td>{{ $isll->nilai_selling3 }}</td>
                <td>{{ $isll->nilai_selling4 }}</td>
                <td>{{ $isll->nilai_selling5 }}</td>
                <td>{{ $isll->nilai_selling6 }}</td>
                <td>{{ $isll->nilai_selling7 }}</td>
                <td>{{ $isll->nilai_selling8 }}</td>
                <td>{{ $isll->nilai_selling9 }}</td>
                <td>{{ $isll->nilai_selling10 }}</td>
                <td>{{ $isll->nilai_produk1 }}</td>
                <td>{{ $isll->nilai_produk2 }}</td>
                <td>{{ $isll->nilai_produk3 }}</td>
                <td>{{ $isll->nilai_produk4 }}</td>
                <td>{{ $isll->nilai_produk5 }}</td>
                <td>{{ $isll->nilai_knowledge1 }}</td>
                <td>{{ $isll->nilai_knowledge2 }}</td>
                <td>{{ $isll->nilai_knowledge3 }}</td>
                <td>{{ $isll->nilai_knowledge4 }}</td>
                <td>{{ $isll->nilai_knowledge5 }}</td>
                <td>
                    @php
                        $hasil = ($isll->nilai_selling1 + $isll->nilai_selling2 + $isll->nilai_selling3 + $isll->nilai_selling4 + $isll->nilai_selling5 + $isll->nilai_selling6 + $isll->nilai_selling7 + $isll->nilai_selling8 + $isll->nilai_selling9 + $isll->nilai_selling10) / 10;
                        echo $hasil;
                    @endphp
                </td>
                <td>
                    @php
                        $hasil = ($isll->nilai_produk1 + $isll->nilai_produk2 + $isll->nilai_produk3 + $isll->nilai_produk4 + $isll->nilai_produk5) / 5;
                        echo $hasil;
                    @endphp
                </td>
                <td>
                    @php
                        $hasil = ($isll->nilai_knowledge1 + $isll->nilai_knowledge2 + $isll->nilai_knowledge3 +
                        $isll->nilai_knowledge4 + $isll->nilai_knowledge5) / 5;
                        echo $hasil;
                    @endphp
                </td>
                <td>
                    @php
                        $sellingSkill = ($isll->nilai_selling1 + $isll->nilai_selling2 + $isll->nilai_selling3 + $isll->nilai_selling4 + $isll->nilai_selling5 + $isll->nilai_selling6 + $isll->nilai_selling7 + $isll->nilai_selling8 + $isll->nilai_selling9 + $isll->nilai_selling10) / 10;

                        $productKnowledge = ($isll->nilai_produk1 + $isll->nilai_produk2 + $isll->nilai_produk3 + $isll->nilai_produk4 + $isll->nilai_produk5) / 5;

                        $marketKnowledge = ($isll->nilai_knowledge1 + $isll->nilai_knowledge2 + $isll->nilai_knowledge3 + $isll->nilai_knowledge4 + $isll->nilai_knowledge5) / 5;

                        $total = ($sellingSkill + $productKnowledge + $marketKnowledge) / 3;
                        echo round($total);
                    @endphp
                </td>
                <td>{{ Carbon\Carbon::parse($isll->tanggal)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($isll->created_at)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>