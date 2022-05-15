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
                <h3 class="text-light">Create môn học</h3>
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
                    <form class="row g-3" method="POST" action="{{route('DanhSachMonHoc.store')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Tên Môn Học</label>
                            <input type="text" name="TenMonHoc" class="form-control"  placeholder="Tên Môn học" value = "{{old('TenMonHoc')}}">
                        </div>
                        <div class="col-md-3">
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
                                Bạn chưa chọn chuyên mục nào
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
                        <div class="col-md-3">
                            <label for="SoTinChi" class="form-label">Số tín chỉ</label>
                            <select id="SoTinChi" name = "SoTinChi">
                                @foreach($stcs as $stc)
                                <option value="{{$stc->SoTinChi}}">{{$stc->SoTinChi}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="lt" class="form-label">LT</label>
                            <input list="lts" name="LT" id="lt">
                            <datalist id="lts">
                                <option value="0">
                                <option value="20">
                                <option value="25">
                                <option value="30">
                                <option value="35">
                                <option value="40">
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="th" class="form-label">LT</label>
                            <input list="ths" name="TH" id="th">
                            <datalist id="ths">
                                <option value="0">
                                <option value="20">
                                <option value="25">
                                <option value="30">
                                <option value="35">
                                <option value="40">
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="tl" class="form-label">LT</label>
                            <input list="tls" name="TL" id="tl">
                            <datalist id="tls">
                                <option value="0">
                                <option value="20">
                                <option value="25">
                                <option value="30">
                                <option value="35">
                                <option value="40">
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="tt" class="form-label">LT</label>
                            <input list="tts" name="TT" id="tt">
                            <datalist id="tts">
                                <option value="0">
                                <option value="20">
                                <option value="25">
                                <option value="30">
                                <option value="35">
                                <option value="40">
                            </datalist>
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
