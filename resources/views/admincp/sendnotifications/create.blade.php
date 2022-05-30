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
                <h3 class="text-light">Send Notification</h3>
                <button class="btn btn-light"><a href="{{route('SendNotification.index')}}">Danh sách thông báo</a></button>
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
                    <form class="row g-3" method="POST" action="{{route('SendNotification.store')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="MaAdmin" class="form-label">Người gửi:</label><br>
                            @foreach($dataad as $account)
                            <b>{{$account->fname}} {{$account->lname}}</b>
                            <input style="display: none" type="text" name="MaAdmin" class="form-control" placeholder="MaAdmin" value = "{{$account->MaAdmin}}" readonly>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <label for="myCheck">Người nhận:</label>
                            <br>
                            <input type="checkbox" id="myCheck"  onclick="myFunction()">
                            <span>Sinh Viên</span>
                            <select id="text" style="display:none" name="MaSV" class="form-control">
                                <option value="">--Chọn sinh viên-</option>
                                @foreach($dssvs as $dssv)
                                <option value="{{$dssv->MaSV}}">{{$dssv->fname}} {{$dssv->lname}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input type="checkbox" id="myCheck2"  onclick="myFunction()" >
                            <span>Giảng Viên</span>
                            <select id="text2" style="display:none" name="MaGV" class="form-control">
                                <option value="">--Chọn giảng viên--</option>
                                @foreach($dsgvs as $dsgv)
                                <option value="{{$dsgv->MaGV}}">{{$dsgv->fname}} {{$dsgv->lname}}</option>
                                @endforeach
                            </select>
                            <!-- <p id="text" style="display:none">Checkbox is CHECKED!</p>


                            <p id="text2" style="display:none">Checkbox2 is CHECKED!</p> -->

                        </div>

                        <script>
                        function myFunction() {
                        var checkBox = document.getElementById("myCheck");
                        var text = document.getElementById("text");
                        var checkBox2 = document.getElementById("myCheck2");
                        var text2 = document.getElementById("text2");
                        if (checkBox.checked == true && checkBox2.checked == false){
                            text.style.display = "block";
                            text.disabled=false;
                            text2.disabled=true;
                            text2.style.display = "none";
                        }
                        else if(checkBox.checked == false && checkBox2.checked == true){
                            text2.style.display = "block";
                            text.style.display = "none";
                            text.disabled=true;
                            text2.disabled=false;
                        }else if(checkBox.checked == true && checkBox2.checked == true){
                            text.style.display = "block";
                            text2.style.display = "block";
                            text.disabled=true;
                            text2.disabled=true;
                            // console.error('Error');
                        } else {
                            text.style.display = "none";
                            text2.style.display = "none";
                            text.disabled=true;
                            text2.disabled=true;
                        }
                        }
                        </script>
                        <div class="col-md-12">
                            <label for="NoiDung" class="form-label">Nội dung thông báo</label>
                            <textarea class="form-control" type="textarea" name="NoiDung" id="NoiDung" maxlength="6000" rows="7" required></textarea>
                            </textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
