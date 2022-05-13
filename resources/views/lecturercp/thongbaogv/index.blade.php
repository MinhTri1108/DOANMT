@extends('layouts.sidebargv')
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
            <h3 class="text-light">Danh sách thông báo</h3>
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
                    </div>
                </div>
            </div>
            <div class="card-body" id="list">
            @foreach($thongbao as $tb)
                <div style="margin-left: 3%;margin-right: 3%;border-style: solid;border-width: 5px; margin-top: 10px;">
                    <div style="margin-left: 3%;margin-right: 3%;margin-top: 2%;margin-bottom: 2%;">
                        <p><b>Người gửi:</b> {{$tb->matk}}<?php $s = sprintf('%05d',$tb->MaAdmin); echo $s?></p>
                        <p><b>Nội dung:</b> {{$tb->noidung}}</p>
                        <p><b>Thời gian:</b> <?php echo \Carbon\Carbon::parse(strtotime($tb->ThoiGian))->format('H:i:s d-m-Y');?></p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{ asset('./bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('./js/script.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
