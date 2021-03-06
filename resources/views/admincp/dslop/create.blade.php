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
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Create Lớp</h3>
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
                    <form class="row g-3" method="POST" action="{{route('DanhSachLop.store')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Tên Lớp</label>
                            <input type="text" name="TenLop" id="slug" class="form-control" onkeyup="ChangeToSlug();" placeholder="Tên Lớp" value = "{{old('TenLop')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Slug tên khoa</label>
                            <input type="text" name="slug_lop" id="convert_slug" class="form-control" placeholder="Slug lớp" value = "{{old('slug_lop')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="khoa" class="form-label">Tên khoa</label>
                            <select class="form-select" aria-label="Default select example" name ="MaKhoa">
                            <option selected> Chọn khoa</option>
                            @foreach($listkhoas as $listkhoa)
                            <option value="{{$listkhoa->MaKhoa}}">{{$listkhoa->TenKhoa}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-6">
                            <label for="khoahoc" class="form-label">Tên khóa học</label>
                            <select class="form-select" aria-label="Default select example" name ="MaKhoaHoc">
                            <option selected> Chọn khóa học</option>
                            @foreach($listkhoahocs as $listkhoahoc)
                            <option value="{{$listkhoahoc->MaKhoaHoc}}">{{$listkhoahoc->TenKhoaHoc}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-6">
                            <label for="hedaotao" class="form-label">Tên hệ đào tạo</label>
                            <select class="form-select" aria-label="Default select example" name ="MaHeDT">
                            <option selected> Chọn hệ đào tạo</option>
                            @foreach($listhdts as $listhdt)
                            <option value="{{$listhdt->MaHeDT}}">{{$listhdt->TenHDT}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
