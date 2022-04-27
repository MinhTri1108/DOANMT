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
        <h3 class="text-light">Điểm danh môn: "{{$lophocphan->monhoc->TenMonHoc}}" Mã học phần: "{{$lophocphan->idhocphan}}" </h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Điểm danh</button>
        </div>
        <!-- modals -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('storediemdanh')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Điểm danh</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã SV</th>
                                    <th>Họ Tên</th>
                                    <th>Điểm danh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sinhviencuahocphan as $ddsv)
                                <tr>
                                    <td><input style="display: none;" type="text" name="MaDK[]" id="" value="{{$ddsv->MaDK}}" size="10" readonly = "true">{{$ddsv->MaSV}}</td>
                                    <td>{{$ddsv->fname}} {{$ddsv->lname}}</td>
                                    <td>
                                        <input type="checkbox" name="DiemDanh[]" id="mycheck" value ='1' onclick="myFunction1()">
                                        <label for="mycheck">Có</label>
                                        <br>
                                        <input type="checkbox" name="DiemDanh[]" id="mycheck2" value ='0' onclick="myFunction1()">
                                        <label for="mycheck2">Không</label>
                                    </td>
                                </tr>
                                @endforeach
                                <script>
                                    function myFunction1() {
                                    // document.getElementById("myCheck").disabled = true;
                                    var checkBox = document.getElementById("myCheck");
                                    var checkBox2 = document.getElementById("myCheck2");
                                    if (checkBox.checked == true){
                                            checkBox.style.display= 'none';
                                            checkBox2.style.display= 'none';
                                        }
                                        else
                                        {
                                            checkBox.style.display= 'none';
                                            checkBox2.style.display= 'none';
                                        }
                                }
                                </script>
                            </tbody>
                        </table>
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
                        <table class="table table-bordered">
                        <thead>
                        <tr style="background-color: #4723d9; color: white;">
                            <th>Mã HP</th>
                            <th>Mã SV</th>
                            <th>Họ Tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Lớp</th>
                            @foreach($ngay as $n)
                            <th>Ngày: <?php echo \Carbon\Carbon::parse($n->Ngay)->format('d-m-Y');?></th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($sinhviencuahocphan as $svofhp)
                            <tr>
                                <td>{{$svofhp->idhocphan}}</td>
                                <td>{{$svofhp->MaSV}}</td>
                                <td>{{$svofhp->fname}} {{$svofhp->lname}}</td>
                                <td>{{$svofhp->NgaySinh}}</td>
                                <td>{{$svofhp->GioiTinh}}</td>
                                <td>{{$svofhp->TenLop}}</td>
                                @foreach($diemdanh->where('MaDK', '=', $svofhp->MaDK) as $dd)
                                   <!-- {{$classes[$dd->Ngay] = $dd}} -->
                                    @foreach($ngay as $day)
                                        @if($day->Ngay == $classes[$dd->Ngay]->Ngay && $classes[$dd->Ngay]->DiemDanh ==1)
                                            <td style="text-alain: center"><img src="http://daotao.qnu.edu.vn/Content/images/Dau.png" alt=""></td>
                                        @elseif($day->Ngay == $classes[$dd->Ngay]->Ngay && $classes[$dd->Ngay]->DiemDanh ==0)
                                            <td style="text-alain: center"><img src="http://daotao.qnu.edu.vn/Content/images/Rot.png" alt=""></td>
                                        @endif
                                    @endforeach

                                @endforeach
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
