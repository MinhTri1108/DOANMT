
@extends('layouts.sidebarsv')
@section('content')
<style>
    .bg-info {
    background-color: #4723d9!important;
    color: white;
    }
    .bg-danger{

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
                    <!-- @if(Cookie::has('check'))
                        <h2 style="text-align: center;">{{Cookie::get('check')}}</h2>
                    @else -->
                    <div class="container">
                            <div class="row ">
                                <select id="mySelect" class="form-control" name = "hocki" onchange="location = this.value;">
                                    <option class="text-center" value="" disabled selected>---Học kì---</option>
                                </select>
                                    <!-- <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary" name = "xem">Xem Thời Khóa Biểu</button>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                        <table class="table table-bordered" style="border: 3px solid black;" >
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
                                <form action="" method="post">
                                    <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style=" vertical-align : middle; text-align: center;">{{$i++}}</td>
                                    @endif
                                    @if ($loop->first)
                                        <td rowspan="{{$dem}}" style=" vertical-align : middle; text-align: center;">
                                        <input type="text" name="idhp" value="<?php
                                        $s = sprintf('%05d',$dkhp->idhocphan);
                                        echo $s;
                                    ?>" size = "2px" style="border:none;" readonly>
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
                                    <td rowspan="{{$dem}}"style="text-align: center;vertical-align : middle;" >
                                        @php($checkdangky= \App\Models\DangKyHocPhan::where('MaSV', $profilesv->MaSV)->orderBy('idhocphan', 'asc')->get())
                                        @php($checkdk = [])
                                        @foreach($checkdangky->where('idhocphan', $dkhp->idhocphan) as $check)
                                            @php($checkdk[]=$check)
                                            <button id="{{$dkhp->idhocphan}} " class="btn bg-danger huydangky {{$dkhp->idhocphan}}">
                                                    Hủy đăng ký
                                            </button>
                                            @break
                                        @endforeach
                                        @if(sizeof($checkdk) < 1)
                                            <button id="{{$dkhp->idhocphan}} " class="btn bg-info dangky {{$dkhp->idhocphan}}">
                                                Đăng ký
                                            </button>
                                        @endif

                                    </td>
                                    @endif
                                </tr>
                                </form>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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

<script type="text/javascript">

$(document).ready(function () {
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $(document).on('click', '.dangky', function(e) {
            e.preventDefault();
            $(".dangky").text('Đang đăng ký...');
            let id = $(this).attr('id');
            console.log(id);

            $.ajax({
            url: "{{ URL('/collegestudent/DangKyHocPhan/dangky')}}"+'/'+id,
            id: id,
            method: 'get',
            success: function(response) {
                Swal.fire(
            'Added!',
            'Account Added Successfully!',
            'success'
            )
            location.reload();
            }
        });
        });
// delete hp
        $(document).on('click', '.huydangky', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');

                console.log(id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url: "{{ URL('/collegestudent/DangKyHocPhan/delete')}}"+'/'+id,
                        method: 'get',
                        id: id,
                        success: function(response) {
                            console.log(response);
                            console.log(id);
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                        location.reload();
                        }
                        });
                    }
                    })
            });
});


</script>
@endsection
