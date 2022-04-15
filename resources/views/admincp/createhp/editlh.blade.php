@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px;" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{URL('admin/EducationProgram/CreateHocPhan')}}">Danh sách Học Phần</a></a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Lịch Học</a></li>
        </ol>
    </nav>
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Create Lịch Học</h3>
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
                    <form class="row g-3" method="POST" action="{{route('CreateLichHoc.update',[$lichhoc->idlichhoc])}}">
                    @method("PUT")
                    @csrf
                        <div class="col-md-12">
                            <label for="idhocphan" class="form-label">Mã Học Phần</label>
                            <br>
                            <select name="idhocphan" id="idhocphan" class="form-select" aria-label="Default select example">
                                <option value="{{$lichhoc->idhocphan}}">{{$lichhoc->idhocphan}}</option>
                                @foreach($hocphans as $hocphan)
                                <?php
                                    $idhp = sprintf('%05d',$hocphan->idhocphan);
                                ?>
                                <option value="{{$hocphan->idhocphan}}"><?php echo $idhp; ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="idthu" class="form-label">Thứ</label>
                            <br>
                            <select name="idthu" id="idthu" class="form-select" aria-label="Default select example">
                                <option value="{{$lichhoc->idthu}}">{{$lichhoc->thu->thumay}}</option>
                                @foreach($thus as $thu)
                                <option value="{{$thu->idthu}}">{{$thu->thumay}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="idtiethoc" class="form-label">Tiết học</label>
                            <br>
                            <select name="idtiethoc" id="idtiethoc" class="form-select" aria-label="Default select example">
                                <option value="{{$lichhoc->idtiethoc}}">{{$lichhoc->tiethoc->TietHoc}} - Start: {{$lichhoc->tiethoc->GioHocBD}} - End: {{$lichhoc->tiethoc->GioHocKT}}</option>
                                @foreach($tiethocs as $tiethoc)
                                <option value="{{$tiethoc->idtiethoc}}">{{$tiethoc->TietHoc}} - Start: {{$tiethoc->GioHocBD}} - End: {{$tiethoc->GioHocKT}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="idphong" class="form-label">Phòng</label>
                            <br>
                            <select name="idphong" id="idphong" class="form-select" aria-label="Default select example">
                                <option value="{{$lichhoc->idphong}}">{{$lichhoc->phong->SoPhong}}</option>
                                @foreach($phongs as $phong)
                                <option value="{{$phong->idphong}}">Phòng số: {{$phong->SoPhong}}</option>
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
