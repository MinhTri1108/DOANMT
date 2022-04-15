@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px; " aria-label="breadcrumb" >
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/DanhSachKhoa')}}">Quản lý khoa</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Khoa',$lop_id->khoa->slug_khoa)}}">Khoa: {{$lop_id->khoa->TenKhoa}}</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Lop',$lop_id->slug_lop)}}">Lớp: {{$lop_id->TenLop}}</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/DanhSachMonHoc-Lop',$lop_id->slug_lop)}}">Chương trình đào tạo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
    </nav>
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Create chương trình đào tạo</h3>
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
                    <form class="row g-3" method="POST" action="{{route('storemonhoccualop')}}">
                        @csrf
                        <div class="col-md-10">
                            <label for="MaLop" class="form-label">Thông tin</label>
                            <br>
                            <input type="checkbox" name="MaLop" value="{{$lop_id->MaLop}}" checked>
                            <label for="MaLop">Khoa: {{$lop_id->khoa->TenKhoa}} -- Lớp: {{$lop_id->TenLop}}</label><br><br>
                        </div>
                        <div class="col-md-2">
                            <label for="HocKi" class="form-label">Học kì</label>
                                <select  onchange="validateSelectBox(this)" id="HocKi" name= "HocKi">
                                    <?php
                                    for($i=1; $i<=9; $i++){
                                    ?>
                                <option value="<?php echo $i?>">
                                    <?php echo $i;
                                        }?>
                                </option>
                            </select>
                            <div id="result">
                                Bạn chưa chọn học kì nào
                            </div>
                            <script language="javascript">
                                function validateSelectBox(obj)
                                {
                                    // Lấy danh sách các options
                                    var options = obj.children;

                                    // Biến lưu trữ các chuyên mục đa chọn
                                    var html = '';

                                    // lặp qua từng option và kiểm tra thuộc tính selected
                                    for (var i = 0; i < options.length; i++){
                                        if (options[i].selected){
                                            html += '<li>'+options[i].value+'</li>';
                                        }
                                    }

                                    // Gán kết quả vào div#result
                                    document.getElementById('result').innerHTML = html;
                                }
                            </script>
                        </div>
                        <div class="col-md-12">
                            <label for="MaMonHoc" class="form-label">Tên Môn Học</label>
                            <select name="MaMonHoc" id="MaMonHoc" class="form-select" aria-label="Default select example">
                                <option value="">--Chọn môn học--</option>
                                @foreach($dsmonhoc as $dsmh)
                                <?php
                                    $mhoc = sprintf('%05d',$dsmh->MaMonHoc);
                                ?>
                                <option value="{{$dsmh->MaMonHoc}}"><?php echo $mhoc; ?>-{{$dsmh->TenMonHoc}}</option>
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
