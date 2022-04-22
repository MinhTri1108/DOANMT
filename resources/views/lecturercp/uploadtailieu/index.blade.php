@extends('layouts.sidebargv')
@section('content')
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
        <h3 class="text-light">Các lớp học của bạn</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="">Add</a></button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
            <div class="container">

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
                     <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 0, &quot;asc&quot; ]]">
                        <thead>
                        <tr style="background-color: #3b89d6;">
                            <th>Mã học phần</th>
                            <th>Mô Tả</th>
                            <th>File</th>
                            <th>Thời gian</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tailieus as $tailieu)
                            <tr id="row{{ $tailieu->id }}" >

                                <td>{{$tailieu->idhocphan}}: </td>
                                <td>{{$tailieu->MoTa}}</td>
                                <td>{{$tailieu->File}}</td>
                                <td>{{$tailieu->ThoiGianFile}}</td>
                                <td>
                                    <a href="{{route('UploadFileTaiLieu.edit', ['UploadFileTaiLieu'=>$tailieu->id])}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="{{route('UploadFileTaiLieu.destroy', ['UploadFileTaiLieu'=>$tailieu->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa tài liệu này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
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
