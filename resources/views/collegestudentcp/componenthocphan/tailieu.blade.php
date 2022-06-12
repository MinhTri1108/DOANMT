@extends('layouts.sidebarsv')
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
        <h3 class="text-light">Tài liệu học phần: "{{$lophocphan->monhoc->TenMonHoc}}" Mã học phần: "{{$lophocphan->idhocphan}}" </h3>
            <!-- <button class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#exampleModal">Upload file</button> -->
        </div>

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
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]" style="border: 3px solid black;">
                        <thead style="background-color: #3b89d6;">
                            <tr style="background-color: #4723d9; color: white;">
                            <th>ID</th>
                            <th>Tên tài liệu</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if (count($files) > 0)
                            @php($i=1)
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{ url($file['downloadUrl']) }}">{{ $file['name'] }}</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <p>Nothing found</p>
                            @endif
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
