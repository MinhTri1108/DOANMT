
@extends('layouts.sidebarsv')
@section('content')
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<body class="bg-light">
<div class="container">

<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Bảng điểm sinh viên. Lớp: "{{$profilesv->lop->TenLop}}"</h3>

        </div>
        <!-- modals -->
        <div class="card-body" id="show_all_adminaccounts">
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}

                        </div>
                    @endif
                        <table class="table table-bordered" style="border: 3px solid black;">
                        <thead>
                        <tr style="background-color: #4723d9; color: white;">
                            <th>TT</th>
                            <th>Mã Học Phần</th>
                            <th>Tên Học Phần</th>
                            <th>Số TC</th>
                            <th>Điểm 10</th>
                            <th>Điểm 4</th>
                            <th>Điểm chữ</th>
                            <th>Kết quả</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        @for($hk=1; $hk<=$hocki; $hk++)
                        <td style="font-weight: bold;" colspan="13">Học kì: {{$hk}}</td>
                        <tbody>

                            @foreach($diem->where('idhocki', $hk) as $d)
                            <tr>
                                <td>{{$d->iddiem}}</td>
                                <td>{{$d->idhocphan}}</td>
                                <td>{{$d->TenMonHoc}}</td>
                                <td>{{$d->SoTinChi}}</td>
                                <td >{{$d->DiemTBMon}}</td>
                                <td style="text-align: center;">{{$d->Diem4}}</td>
                                <td style="text-align: center;">{{$d->DiemChu}}</td>
                                <td style="text-align: center;">
                                    @if($d->DiemTBMon >= 4)
                                    <img src="http://daotao.qnu.edu.vn/Content/images/Dau.png" alt="">
                                    @else
                                    <img src="http://daotao.qnu.edu.vn/Content/images/Rot.png" alt="">
                                    @endif
                                </td>
                                <td style="text-align: center;" data-bs-toggle="modal" data-bs-target="#diemchitiet-{{$d->iddiem}}">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwB5wdJzPb_4VpaRcUDMcQqCLAC4uKf5bd3OolQCazZdlVnPn9Zrl0O_7_GDJABmemLSQ&usqp=CAU" alt="" style="width: 17px;height: 17px;">
                                <!-- modal -->
                                <div class="modal fade" id="diemchitiet-{{$d->iddiem}}" tabindex="-1" aria-labelledby="diemchitietLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="diemchitietLabel">Điểm môn:{{$d->TenMonHoc}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered" style="border: 3px solid black;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Điểm chuyên cần </th>
                                                        <th>Điểm giữa kì    </th>
                                                        <th>Điểm thi        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Điểm lần 1</td>
                                                        <td style="text-align: center;">{{$d->DiemCC}}</td>
                                                        <td style="text-align: center;">{{$d->DiemGK}}</td>
                                                        <td style="text-align: center;">{{$d->DiemThi}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Điểm lần 2</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- endmodal -->
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                            <tr colspan="13" style="background: #8fa5c5;">
                            @foreach($diemtbhk->where('idhocki', $hk) as $dtb)
                                <td colspan="4">
                                    <p>Tổng số tín chỉ: <b>{{$dtb->SoTC}}</b></p>
                                    <p>Số tín chỉ đạt: <b></b></p>
                                    <p>Số tín chỉ không đạt: <b></b></p>
                                    <p>Điểm trung bình học kì (Hệ 10): <b>{{$dtb->DiemTB}}</b></p>
                                    <p>Điểm trung bình học kì (Hệ 4): <b>{{$dtb->DiemTB4}}</b></p>
                                </td>
                            @endforeach
                            @foreach($diemtichluy->where('idhocki', $hk) as $dtl)
                                <td colspan="9">
                                    <p>Số tín chỉ tích lũy: <b>{{$dtl->SoTC}}</b></p>
                                    <p>Điểm trung bình tích lũy (Hệ 10): <b>{{$dtl->DiemTichLuy10}}</b></p>
                                    <p>Điểm trung bình tích lũy (Hệ 4): <b>{{$dtl->DiemTichLuy4}}</b></p>
                                </td>
                            </tr>
                            @endforeach

                        @endfor

                    </table>

                </div>
            </div>
        </div>
        <!-- end table -->
        <script type="text/javascript" src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{ asset('./bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('./js/script.js') }}"></script>
    </div>
    </div>
</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
