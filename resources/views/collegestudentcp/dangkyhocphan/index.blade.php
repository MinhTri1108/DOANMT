
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
        <h3 class="text-light">Đăng kí học phần. Lớp: "{{$profilesv->lop->TenLop}}"</h3>

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
                        <thead style="background-color: #4723d9; color: white;vertical-align : middle;text-align: center;">
                            <tr style="">
                                <th rowspan="2" >STT</th>
                                <th rowspan="2">Mã HP</th>
                                <th rowspan="2" >Tên học phần</th>
                                <th rowspan="2" >Số tín chỉ</th>
                                <th colspan="3" >Lịch học</th>
                                <th rowspan="2" >Đăng kí</th>
                            </tr>
                            <tr>
                                <th>Thời gian</th>
                                <th>Phòng</th>
                                <th>Giảng viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($dangkyhocphan as $dkhp)
                            @php($dem= \App\Models\LichHoc::where('idhocphan', $dkhp->idhocphan)->count('idhocphan'))
                                @foreach($lichhoc->where('idhocphan', '=', $dkhp->idhocphan) as $lh)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style=" vertical-align : middle; text-align: center;">{{$i++}}</td>
                                    @endif
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style=" vertical-align : middle; text-align: center;">
                                        <?php
                                        $s = sprintf('%05d',$dkhp->idhocphan);
                                        echo $s;
                                    ?>
                                        </td>
                                    @endif
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style=" vertical-align : middle; text-align: center;">{{$dkhp->TenMonHoc}} {{$dkhp->MaMonHoc}}</td>
                                    @endif
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style=" vertical-align : middle; text-align: center;">{{$dkhp->SoTinChi}} t.c</td>
                                    @endif
                                    <td>
                                        Thứ: {{$lh->thumay}}
                                        <br>
                                        Tiết: {{$lh->TietHoc}}
                                        <br>
                                        Start: {{$lh->GioHocBD}}
                                        <br>
                                        End: {{$lh->GioHocKT}}
                                    </td>
                                    <td style="text-align: center;vertical-align : middle;">{{$lh->SoPhong}}</td>

                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style="text-align: center;vertical-align : middle;">{{$dkhp->fname}} {{$dkhp->lname}}</td>
                                    @endif
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}"style="text-align: center;vertical-align : middle;" ><a href="">Đăng ký</a></td>
                                    @endif
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
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
