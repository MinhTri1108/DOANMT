@extends('layouts.sidebargv')
@section('content')
{{-- add new employee modal start --}}
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
        <h3 class="text-light">Upload điểm môn: "{{$lophocphan->monhoc->TenMonHoc}}" Mã học phần: "{{$lophocphan->idhocphan}}" </h3>
            <button class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#exampleModal">Upload điểm</button>
        </div>
        <!-- modals -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('storeuploaddiem')}}" method="post" class="row g-3">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload điểm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="MaSV" class="form-label">Mã sinh viên</label>
                            <select name="MaDK" class="form-select" aria-label="Default select example">
                                <option selected>--Chọn sinh viên--</option>
                                @foreach($sinhviencuahocphan as $sv)
                                <option value="{{$sv->MaDK}}">{{$sv->MaSV}}-{{$sv->masv->fname}} {{$sv->masv->lname}}</option>
                                @endforeach
                            </select>
                        </div class="col-md-12" >
                        <span style="color: red;"> Vui lòng chọn hệ số trước</span>
                        <div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label  for="DiemCC" class="form-label">Điểm chuyên cần</label>
                                <input style="display: none;" type="number" id= "diemcc"name="DiemCC" class="form-control" >
                            </div>
                            <div class="col-md-3">
                                <label for="hesocc" class="form-label">Hệ số</label>
                                <br>
                                    <select  onchange="validateSelectBox1(this)" id="hesocc" name= "hesocc" class="form-control" >
                                        <?php
                                        for($i=1; $i<=10; $i++){
                                        ?>
                                    <option value="<?php echo $i?>">
                                        <?php echo $i;
                                            }?>
                                    </option>
                                </select>

                            </div>
                            <div class="col-md-3" id="result1">
                                    Bạn chưa chọn hệ số điểm
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="DiemGK" class="form-label">Điểm giữa kì</label>
                                <input style="display: none;" type="number" id= "diemgk" name="DiemGK" class="form-control" >
                            </div>
                            <div class="col-md-3">
                                <label for="hesogk" class="form-label">Hệ số</label>
                                <br>
                                    <select  onchange="validateSelectBox2(this)" id="hesogk" name= "hesogk" class="form-control" >
                                        <?php
                                        for($i=1; $i<=10; $i++){
                                        ?>
                                    <option value="<?php echo $i?>">
                                        <?php echo $i;
                                            }?>
                                    </option>
                                </select>

                            </div>
                            <div class="col-md-3" id="result2">
                                    Bạn chưa chọn hệ số điểm
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="DiemThi" class="form-label">Điểm cuối kì</label>
                                <input style="display: none;" type="number" id= "diemthi" name="DiemThi" class="form-control" >
                            </div>
                            <div class="col-md-3">
                                <label for="hesothi" class="form-label">Hệ số</label>
                                <br>
                                    <select  onchange="validateSelectBox3(this)" id="hesothi" name= "hesothi" class="form-control" >
                                        <?php
                                        for($i=1; $i<=10; $i++){
                                        ?>
                                    <option value="<?php echo $i?>">
                                        <?php echo $i;
                                            }?>
                                    </option>
                                </select>

                            </div>
                            <div class="col-md-3" id="result3">
                                    Bạn chưa chọn hệ số điểm
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="DiemTB" class="form-label">Điểm trung bình</label>
                            <input type="text" id= "diemtb" name="DiemTBMon" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>

            </div>
            </div>
<!-- endmodal -->
<script>
    $(document).ready(function () {
        $('#diemcc, #diemgk, #diemthi').keyup(function (e) {

            // console.log(diemcc);
            var diemtb = 0;
            var diemcc = Number($('#diemcc').val());
            var diemgk = Number($('#diemgk').val());
            var diemthi = Number($('#diemthi').val());

            var hesocc = Number($('#hesocc').val());
            var hesogk = Number($('#hesogk').val());
            var hesothi = Number($('#hesothi').val());

            var diemtb = ((diemcc * hesocc) + (diemgk * hesogk) + (diemthi * hesothi))/(hesocc+hesogk+hesothi);
            // $('#diemtb').val(diemtb);
            if(hesocc+hesogk+hesothi == 10)
            {
                 $('#diemtb').val(diemtb);
            }
            else{
                $('#diemtb').val('Hệ số của bạn không bằng 10');
            }
            // console.log(hesocc)
        });
    //     function diemtb($diemtrungbinh)
    // {
    //     var diemchuyencan = $diemtrungbinh.find('#diemcc').val();
    //     var diemgiuaki = $diemtrungbinh.find('#diemgk').val();
    //     var diemthi = $diemtrungbinh.find('#diemthi').val();

    //     diemchuyencan = (diemchuyencan === ''? 0 : parseFloat(diemchuyencan));
    //     diemgiuaki = (diemgiuaki === ''? 0 : parseFloat(diemgiuaki));
    //     diemthi = (diemthi === ''? 0 : parseFloat(diemthi));

    //     var diemtbcc = ((diemchuyencan * 1) + (diemgiuaki * 3) + (diemthi * 6));
    //     $diemtrungbinh.find('#diemtb').text(diemtbcc);
    // }
    // $(document).on('change', '#diemcc','#diemgk','#diemthi',function(){
    //     var myTr =$(this).parent().parent();
    //     diemtb(myTr);
    // })
    });
</script>
<script language="javascript">
    function validateSelectBox1(obj)
    {
        // Lấy danh sách các options
        var options = obj.children;

        // Biến lưu trữ các chuyên mục đa chọn
        var html = '';
        var diemcc1 = document.getElementById("diemcc");
        if(html === '')
        {
            diemcc1.style.display="block";
        }
        // lặp qua từng option và kiểm tra thuộc tính selected
        for (var i = 0; i < options.length; i++){
            if (options[i].selected){
                html += '<li>'+options[i].value+'</li>';
            }
        }
        console.log(html);
        // Gán kết quả vào div#result
        document.getElementById('result1').innerHTML = html;
    }
     function validateSelectBox2(obj)
    {
        // Lấy danh sách các options
        var options = obj.children;

        // Biến lưu trữ các chuyên mục đa chọn
        var html = '';
        var diemgk1 = document.getElementById("diemgk");
        if(html === '')
        {
            diemgk1.style.display="block";
        }
        // lặp qua từng option và kiểm tra thuộc tính selected
        for (var i = 0; i < options.length; i++){
            if (options[i].selected){
                html += '<li>'+options[i].value+'</li>';
            }
        }

        // Gán kết quả vào div#result
        document.getElementById('result2').innerHTML = html;
    }
     function validateSelectBox3(obj)
    {
        // Lấy danh sách các options
        var options = obj.children;

        // Biến lưu trữ các chuyên mục đa chọn
        var html = '';
        var diemthi1 = document.getElementById("diemthi");
        if(html === '')
        {
            diemthi1.style.display="block";
        }
        // lặp qua từng option và kiểm tra thuộc tính selected
        for (var i = 0; i < options.length; i++){
            if (options[i].selected){
                html += '<li>'+options[i].value+'</li>';
            }
        }

        // Gán kết quả vào div#result
        document.getElementById('result3').innerHTML = html;
    }
</script>

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
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                        <thead style="background-color: #3b89d6;">
                            <tr style="background-color: #4723d9; color: white;">
                            <th>Avatar</th>
                            <th>Mã SV</th>
                            <th>Họ Tên</th>
                            <th>Lớp</th>
                            <th>Ngày Sinh</th>
                            <th>Giới tính</th>
                            <th>Điểm CC</th>
                            <th>Điểm GK</th>
                            <th>Điểm cuối kì</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($diemsinhvien as $sv)
                            <tr>
                                <td>
                                    {{$sv->avatar}}
                                </td>
                                <td>
                                    {{$sv->MaSV}}
                                </td>
                                <td>
                                    {{$sv->fname}} {{$sv->lname}}
                                </td>
                                <td>
                                    {{$sv->TenLop}}
                                </td>
                                <td>
                                    {{$sv->NgaySinh}}
                                </td>
                                <td>
                                    {{$sv->GioiTinh}}
                                </td>
                                <td>
                                    {{$sv->DiemCC}}
                                </td>
                                <td>
                                    {{$sv->DiemGK}}
                                </td>
                                <td>
                                    {{$sv->DiemThi}}
                                </td>
                                <td>
                                    <a href="" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="{{route('deleteuploaddiem', [$sv->iddiem])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa điểm này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
                                   </form>
                                </td>
                            </tr>
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
