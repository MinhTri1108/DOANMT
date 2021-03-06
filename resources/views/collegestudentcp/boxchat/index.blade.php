@extends('layouts.sidebarsv')
@section('content')
<h1>Chat</h1>
<div id ="data">
    @foreach($chat as $c)
    <p id="{{$c->id}}"><strong>{{$c->name}}: </strong>{{$c->msg}}</p>
    @endforeach
</div>
<form method="post" action="{{route('BoxChat.store')}}">
    @csrf
    <label for="">Name</label>
    <input type="text" name="name" id="">
    <br>
    <label for="">Noi dung</label>
    <input type="text" name="msg" id="">
    <br>
    <button type="submit">Gui</button>
</form>
@endsection
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.js" integrity="sha512-/xb5+PNOA079FJkngKI2jvID5lyiqdHXaUUcfmzE0X0BdpkgzIWHC59LOG90a2jDcOyRsd1luOr24UCCAG8NNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var socket = io('http://127.0.0.1:6001', { transports: ['websocket'] })

    socket.on('laravel_database_chat:message', function(data){
        console.log(data)
        if($('#'+data.id).length == 0){
         $('#data').append('<p><strong>'+data.name+'</strong>: '+data.msg+'</p>')
        }else
        {
            console.log('Da co tin nhan');
        }
    })
</script>
