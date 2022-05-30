@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    /* #test{
    border-radius: 15px; text-align: center;

    } */
    .dssv{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: red;
        color: white;
    }
    .dssv:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .hplop{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: blue;
        color: white;
    }
    .hplop:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .ghichu{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: green;
        color: white;
    }
    .ghichu:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .nghiencuu{
    width: 80%;
    height: 180px;
    transform: scale(1);
    transition: all 0.5s;
    padding: 10px;
    box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
    border-radius: 8px;
    text-align : center;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #d2d247;
    color: white;
    }
    .nghiencuu:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
</style>
<style>
    #caption{
        background-color:#0202025c;
    }
    #slide{
        border-radius : 0px;
    }
</style>
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>

<div class="container-fluid w-90 p-3 ">
<div class="row mt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-8">
                <div class="card shadow ml-3">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Diễn đàn</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style = "row-gap :20px;">
                            <div class="col-4" style = "" id = "test">
                                <a href="{{route('sharefile')}}"style="text-decoration: none">
                                    <div class="dssv">
                                        <h3>Chia sẻ tài liệu</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4" style = "" id = "test">
                                <a href="{{route('QAaboutCode')}}"style="text-decoration: none">
                                    <div class="hplop">
                                        <h3>Diễn đàn lập trình</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4" style = "" id = "test">
                                <a href="" style="text-decoration: none">
                                    <div class="ghichu">
                                        <h3>Diễn đàn Tiếng Anh</h3>
                                        <small  style="color:red">Đang phát triển</small>

                                    </div>
                                </a>
                            </div>
                            <div class="col-4" style = "" id = "test">
                                <a href=""style="text-decoration: none">
                                    <div class="nghiencuu" >
                                        <h3>Diễn đàn Nghiên cứu khoa học</h3>
                                        <small style="color:red">Đang phát triển</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow ml-3" >
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Chat Forum <i class='bx bxs-message-square-dots bx-tada' ></i></h3>
                    </div>
                    <div id="chat-box" class="card-body" style= "height: auto;max-height: 400px;overflow-x: hidden;">
                        <div class="row" style = "row-gap :20px" >
                            <div id ="data">
                                @foreach($chat as $c)
                                    <div class= "row">
                                        <div class= "col-8">
                                            <p id="{{$c->id}}"><strong>{{$c->name}}: </strong>{{$c->msg}}

                                            </p>
                                        </div>
                                        <div class= "col-4">
                                            <p>
                                                 <?php
                                                    \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
                                                    $date = \Carbon\Carbon::parse($c->created_at);
                                                    $elapsed = $date->diffForHumans(\Carbon\Carbon::now());
                                                    echo $elapsed;
                                                    ?>
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <form action="{{route('postchatnoacc')}}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Name: </label>
                                <div class="col-sm-9">
                                    @foreach($dataad as $account)
                                    <input type="text" name="name" class="form-control" id="" readonly value="ADMIN: {{$account->fname}} {{$account->lname}}" required>

                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Content: </label>
                                <div class="col-sm-9">
                                    <input type="text" name="msg" class="form-control" id="" required>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mb-3">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>



<div class="container-fluid w-90 p-3 ">
<div class="row mt-5">
    <div class="col-12">
        <div class="row">
                <div class="card shadow ml-3">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Danh sách tuyển dụng</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style = "row-gap :20px">
                            @foreach($lichs as $key=> $lich)
                            <div class="col-6"  id = "test">
                                <a href="">
                                    <div class="tuyendung">
                                        <img id="slide" src="{{$lich->images}}" class="d-block w-100"style="height: 500px;" >
                                        <div >
                                            <h5 id = "noidung1">{{$lich->NoiDung}}</h5>
                                            <p>{{$lich->DiaDiem}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

        </div>

    </div>
</div>
</div>

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.js" integrity="sha512-/xb5+PNOA079FJkngKI2jvID5lyiqdHXaUUcfmzE0X0BdpkgzIWHC59LOG90a2jDcOyRsd1luOr24UCCAG8NNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
     var element = document.getElementById("chat-box");
    element.scrollTop = element.scrollHeight ;
    var socket = io('http://127.0.0.1:6001', { transports: ['websocket'] })

    socket.on('laravel_database_chat:message', function(data){
        console.log(data)
        if($('#'+data.id).length == 0){
         $('#data').append('<p><strong>'+data.name+'</strong>: '+data.msg+'</p>')
        return false;
        }else
        {
            console.log('Da co tin nhan');
        }
    })
</script>
@endsection
