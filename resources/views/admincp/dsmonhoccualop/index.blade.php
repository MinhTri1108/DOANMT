@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px; " aria-label="breadcrumb" >
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/DanhSachKhoa')}}">Quản lý khoa</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Khoa',$lop_id->khoa->slug_khoa)}}">Khoa: {{$lop_id->khoa->TenKhoa}}</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Lop',$lop_id->slug_lop)}}">Lớp: {{$lop_id->TenLop}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chương trình đào tạo</li>
        </ol>
    </nav>
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Chương trình đào tạo của lớp: {{$lop_id->TenLop}}</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="{{route('createmonhoccualop', [$lop_id->slug_lop])}}">Create chương trình đào tạo</a></button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
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

                    <table class="table table-bordered">
                        <thead>
                        <tr style="background-color: #3b89d6;">
                            <th>Mã Môn Học</th>
                            <th>Tên Môn Học</th>
                            <th>Số tín chỉ</th>
                            <th>LT</th>
                            <th>TH</th>
                            <th>TL</th>
                            <th>TT</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        @for($hk=1; $hk<=$counthk; $hk++)
                        <td colspan="9">Học kì: {{$hk}}</td>
                        <tbody>
                            @foreach($mhoflop->where('idhocki', '=', $hk) as $mh)
                            <tr>
                                <td>
                                    <?php
                                    $mamh = sprintf('%05d',$mh->MaMonHoc);
                                    ?>
                                    <?php echo $mamh;
                                    ?>
                                </td>
                                <td>{{$mh->monhoc->TenMonHoc}}</td>
                                <td>{{$mh->monhoc->SoTinChi}} t.c</td>
                                <td>{{$mh->monhoc->LT}}</td>
                                <td>{{$mh->monhoc->TH}}</td>
                                <td>{{$mh->monhoc->TL}}</td>
                                <td>{{$mh->monhoc->TT}}</td>
                                <td>
                                   <form action="{{route('destroymonhoccualop', [$mh->idmonhoccualop])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa môn học này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
                                   </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
