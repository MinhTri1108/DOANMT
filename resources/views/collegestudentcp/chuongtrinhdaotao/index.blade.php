@extends('layouts.sidebarsv')
@section('content')
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
        <h3 class="text-light">Chương trình đào tạo. Lớp: "{{$profilesv->lop->TenLop}}"</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Điểm danh</button> -->
        </div>
        <!-- modals -->
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
                        <table class="table table-bordered" style="border: 3px solid black;">
                        <thead  style=" vertical-align : middle; text-align: center;">
                        <tr style="background-color: #4723d9; color: white;">
                            <th rowspan="2">TT</th>
                            <th rowspan="2"style="text-align: center;">Mã học phần</th>
                            <th rowspan="2" style="text-align: center;">Tên học phần</th>
                            <th rowspan="2">Số TC</th>
                            <th colspan="7" style="text-align: center;">Số tiết</th>
                            <th rowspan="2">Học phần học trước</th>
                            <th rowspan="2">Học phần thay thế</th>
                        </tr>
                        <tr style="background-color: #4723d9; color: white;">
                            <th>LT</th>
                            <th>TH</th>
                            <th>TL</th>
                            <th>TT</th>
                            <th>BTL</th>
                            <th>DA</th>
                            <th>KL</th>
                        </tr>
                        </thead>
                        @for($hk=1; $hk<=$counthk; $hk++)
                        <td style="font-weight: bold;" colspan="13">Học kì: {{$hk}}</td>
                        <tbody>
                            @foreach($chuongtrinhdaotao->where('HocKi', '=', $hk) as $ctdt)
                            <tr>
                                <td>{{$ctdt->idmonhoccualop}}</td>
                                <td>
                                    <?php
                                    $hp = sprintf('%05d',$ctdt->idmonhoccualop);
                                    ?>
                                    <?php echo $hp;
                                    ?>
                                </td>
                                <td>{{$ctdt->monhoc->TenMonHoc}}</td>
                                <td>{{$ctdt->monhoc->SoTinChi}}</td>
                                <td>{{$ctdt->monhoc->LT}}</td>
                                <td>{{$ctdt->monhoc->TH}}</td>
                                <td>{{$ctdt->monhoc->TL}}</td>
                                <td>{{$ctdt->monhoc->TT}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endfor
                    </table>
                     <span style="font-weight: bold;">- Ghi chú: LT : Lý thuyết; TH: Thực hành; TT : Thực tập, thực tế ...; BTL: Bài tập lớn; ĐA: Đồ án; KL : Khóa luận tốt nghiệp; (*) Học phần điều kiện</span>
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
