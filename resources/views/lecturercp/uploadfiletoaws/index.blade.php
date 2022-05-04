@extends('layouts.sidebargv')
@section('content')
<body class="bg-light">
<div class="container">
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Upload file tài liệu</h3>
                 <!-- <button class="btn btn-light"><a href="">Danh sách file đã up</a></button> -->
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
                    <form class="row g-3" method="POST" action="{{route('storefiletoaws')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="TenLopHoc" class="form-label">Tên lớp học - Học phần</label>
                            <br>
                            <select id="idhocphan" name = "idhocphan" class="form-control">
                                <option value="">--Chọn Học phần--</option>
                                @foreach($lophocphan as $lhp)
                                <option value="{{$lhp->idhocphan}}">{{$lhp->idhocphan}}-{{$lhp->monhoc->TenMonHoc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="File" class="form-label">Chọn tài liệu</label>
                            <input class="form-control" type="file" id="File" name= "File">
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
