@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px;" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{URL('admin/EducationProgram/CreateHocPhan')}}">Danh sách Học Phần</a></a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Học Phần</a></li>
        </ol>
    </nav>
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Create Học Phần</h3>
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="card-body" id="">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}

                        </div>
                     @endif
                    <form class="row g-3" method="POST" action="{{route('CreateHocPhan.update', [$hocphan->idhocphan])}}">
                        @method("PUT")
                        @csrf
                        <div class="col-md-12">
                            <label for="MaGV" class="form-label">Tên giáo viên</label>
                            <br>
                            <select name="MaGV" id="MaGV" class="form-select" aria-label="Default select example">
                                <?php
                                $magv= sprintf('%05d',$hocphan->MaGV);
                                ?>
                                <option value="{{$hocphan->MaGV}}"> {{$hocphan->matk}}<?php echo $magv;?>-{{$hocphan->fname}} {{$hocphan->lname}}</option>
                                @foreach($gvs as $gv)
                                <?php
                                    $s = sprintf('%05d',$gv->MaGV);
                                ?>
                                <option value="{{$gv->MaGV}}">{{$gv->permission->matk}}<?php echo $s; ?>-{{$gv->fname}} {{$gv->lname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="MaMonHoc" class="form-label">Môn Học</label>
                            <br>
                            <select name="MaMonHoc" id="MaMonHoc" class="form-select" aria-label="Default select example">
                                <?php
                                $mamh= sprintf('%05d',$hocphan->MaMonHoc);
                                ?>
                                <option value="{{$hocphan->MaMonHoc}}"><?php echo $mamh;?>-{{$hocphan->TenMonHoc}}</option>
                                @foreach($mhs as $mh)
                                <?php
                                    $mhoc = sprintf('%05d',$mh->MaMonHoc);
                                ?>
                                <option value="{{$mh->MaMonHoc}}"><?php echo $mhoc; ?>-{{$mh->TenMonHoc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
