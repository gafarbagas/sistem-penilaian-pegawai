<div class="row mb-3">
    <div class="col-sm-6">
        <div class="mb-3">
            <p><b>Detail Employee</b></p>
        </div>
        
        <div class="row mb-2">
            <div class="col-sm-3">PC Name</div>
            <div class="col-sm-1 d-none d-xl-inline col-sm-1">:</div>
            <div class="col-sm-8">{{ $employee->nama_employee }}</div>
        </div>
        
        <div class="row mb-2">
            <div class="col-sm-3">Site Name</div>
            <div class="col-sm-1 d-none d-xl-inline col-sm-1">:</div>
            <div class="col-sm-8">{{ $employee->nama_site }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">Status</div>
            <div class="col-sm-1 d-none d-xl-inline col-sm-1">:</div>
            <div class="col-sm-8">{{ $employee->status }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">Grading</div>
            <div class="col-sm-1 d-none d-xl-inline col-sm-1">:</div>
            <div class="col-sm-8">{{ $employee->grading }}</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row mb-2">
            <div class="col-sm">
                @if ($isp != NULL)
                    <img src="/admin/img/gambar_aktivitas/{{$isp->gambar ?? '-'}}" width="70%">
                @else
                    <p style="color: red">Foto Kegiatan Belum di Upload</p>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- <div class="row mt-3">
    <label class="col-sm-2">Trainer Name</label>
    <div class="col-sm-8">{{ $grup->trainer->nama_trainer ?? '-'}}</div>
</div> --}}

<div class="row mt-3 mb-3">
    <div class="col-sm-6">
        <p>In Class Promotor</p>
        <div class="row mb-2">
            <div class="col-sm-3">Tanggal</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">
                @if ($icp != NULL)
                    {{Carbon\Carbon::parse($icp->tanggal)->format('d-m-Y') ?? '-'}}
                @else
                    -
                @endif
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">Nilai Selling</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">{{$icp->nilai1 ?? '-'}}</div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">Nilai Pre Test</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">{{$icp->nilaipre ?? '-'}}</div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-3">Nilai Post Test</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">{{$icp->nilaipost ?? '-'}}</div>
        </div>
    </div>
    <div class="col-sm-6">
        <p>In Store Promotor</p>
        <div class="row mb-2">
            <div class="col-sm-4">Tanggal</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">
                @if ($isp != NULL)
                    {{Carbon\Carbon::parse($isp->tanggal)->format('d-m-Y') ?? '-'}}
                @else
                    -
                @endif
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">Selling Skill</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">
                @php
                    if ($isp == NULL) {
                        echo '-';
                    } else {
                        $hasil = ($isp->nilai_selling1 + $isp->nilai_selling2 + $isp->nilai_selling3 +
                        $isp->nilai_selling4 + $isp->nilai_selling5 + $isp->nilai_selling6 +
                        $isp->nilai_selling7 + $isp->nilai_selling8 + $isp->nilai_selling9 +
                        $isp->nilai_selling10) /10;
                        echo $hasil;
                    }
                @endphp
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">Product Knowledge</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">
                @php
                    if ($isp == NULL) {
                        echo '-';
                    } else {
                    $hasil = ($isp->nilai_produk1 + $isp->nilai_produk2 + $isp->nilai_produk3 +
                    $isp->nilai_produk4 + $isp->nilai_produk5) /5;
                    echo $hasil;
                    }
                @endphp
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4">Market Knowledge</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">
                @php
                if ($isp == NULL) {
                        echo '-';
                    } else {
                $hasil = ($isp->nilai_knowledge1 + $isp->nilai_knowledge2 + $isp->nilai_knowledge3 +
                $isp->nilai_knowledge4 + $isp->nilai_knowledge5) /5;
                echo $hasil;
            }
            @endphp
            </div>
        </div>
        <hr style="background-color: #eee;
        border: 2 none;
        color: #eee;
        height: 1px;"/>
        <div class="row mb-2">
            <div class="col-sm-4">Total Nilai</div>
            <div class="col-sm-1 d-none d-sm-inline col-sm-1">:</div>
            <div class="col-sm">
                @php
                if ($isp == NULL) {
                        echo '-';
                    } else {
                $sellingSkill = ($isp->nilai_selling1 + $isp->nilai_selling2 + $isp->nilai_selling3 +
                    $isp->nilai_selling4 + $isp->nilai_selling5 + $isp->nilai_selling6 +
                    $isp->nilai_selling7 + $isp->nilai_selling8 + $isp->nilai_selling9 +
                    $isp->nilai_selling10) /10;
                $productKnowledge = ($isp->nilai_produk1 + $isp->nilai_produk2 + $isp->nilai_produk3 +
                    $isp->nilai_produk4 + $isp->nilai_produk5) /5;
                $marketKnowledge = ($isp->nilai_knowledge1 + $isp->nilai_knowledge2 + $isp->nilai_knowledge3 +
                    $isp->nilai_knowledge4 + $isp->nilai_knowledge5) /5;
                $total = ($sellingSkill + $productKnowledge + $marketKnowledge) / 3;
                    echo round($total);
                    }
            @endphp
            </div>
        </div>
    </div>
</div>

