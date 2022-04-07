@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<body class="bg-light">
<div class="container">
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Create khoa</h3>
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
                    <form class="row g-3" method="POST" action="{{route('DanhSachKhoa.store')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Tên khoa</label>
                            <input type="text" name="TenKhoa" id="slug" class="form-control" onkeyup="ChangeToSlug();" placeholder="Tên Khoa" value = "{{old('TenKhoa')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Slug tên khoa</label>
                            <input type="text" name="slug_khoa" id="convert_slug" class="form-control" placeholder="Slug tên khoa" value = "{{old('slug_khoa')}}">
                        </div>
                        <div class="col-12">
                            <label for="DiaChiKhoa" class="form-label">Địa chỉ khoa</label>
                            <input type="text" name="DiaChiKhoa" id="DiaChiKhoa" class="form-control" placeholder="Địa chỉ khoa" value = "{{old('DiaChiKhoa')}}">
                        </div>
                        <div class="col-12">
                            <label for="SDTKhoa" class="form-label">Số điện thoại khoa</label>
                            <input type="text" name="SDTKhoa" id="SDTKhoa" class="form-control" placeholder="Số điện thoại" value = "{{old('SDTKhoa')}}">
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
