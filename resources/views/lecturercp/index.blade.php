@extends('layouts.sidebargv')
@section('content')
<div class="container-fluid ">
<div class="row mt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-8">
                <div class="card shadow ml-3">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Danh sách tuyển dụng</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style = "row-gap :20px">
                            @foreach($lichs as $key=> $lich)
                            <div class="col-6"  id = "test">
                                <a href="">
                                    <div class="dssv">
                                        <img id="slide" src="{{$lich->images}}" class="d-block w-100"style="height: 500px;" >
                                        <div >
                                            <h5 id = "noidung">{{$lich->NoiDung}}</h5>
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
            <div class="col-4">
                <div class="card shadow ml-3" >
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Chat Forum <i class='bx bxs-message-square-dots bx-tada' ></i></h3>
                    </div>
                    <div id="chat-box" class="card-body" style= "height: auto;max-height: 400px;overflow-x: hidden;">
                        <div class="row" style = "row-gap :20px" >
                            <div id ="data">
                                @foreach($chat as $c)
                                    <p id="{{$c->id}}"><strong>{{$c->name}}: </strong>{{$c->msg}}</p>
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
                                    @foreach($data as $account)
                                    <input type="text" name="name" class="form-control" id="" readonly value="GV: {{$account->fname}} {{$account->lname}}" required>

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
