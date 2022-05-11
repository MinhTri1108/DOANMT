<style>
    .body-pd{
        position: fixed ;
    }

</style>
@extends('layouts.sidebarsv')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('./css/message.css') }}">
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header class= "nd">
        @foreach($profile as $pf)
        <div>
        <a href="{{URL('/collegestudent/Messenger/')}}" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="" alt="">
        </div>
        <div class="details">
          <span>{{$pf->fname}} {{$pf->lname}}</span>
          <p>{{$pf->Status}}</p>
        </div>
        <div style="margin-left: 75%;display: flex;">
            <div>
                <h1><i class='bx bxs-phone-call'></i></h1>
            </div>
            <div style="margin-left: 20px;">
                <h1><i class='bx bx-video' ></i></h1>
            </div>
        </div>
        @endforeach

      </header>
      <div class="chat-box">

      </div>
        <form method="POST" id = "form-chat" class="typing-area">
            @csrf
            <input type="text" class="incoming_id" name="incoming_id" value="{{$pf->MaSV}}" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
            <button type="submit" id="send"><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
  </div>
  <!-- <script type="text/javascript" src="{{ asset('./js/chat.js') }}"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

$(document).ready(function () {
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    $("#form-chat").submit(function(e) {
        e.preventDefault();
        const formdata = new FormData(this);
        $("#send").text('Send');
        $.ajax({
        url: "{{ URL('/collegestudent/Messenger/postchat')}}",
        type: "method",
        method: 'post',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
        if (response.status == 200) {
            // console.log(response);
                setInterval(
            function(){
                getchat();
            }, 500);

        }
        $("#send").html('<i class="fab fa-telegram-plane"></i>');
        $("#form-chat")[0].reset();
        }
    });
    });
//     setInterval(() =>{
//     let xhr = new XMLHttpRequest();
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.send("incoming_id="+incoming_id);
// }, 500);
    setInterval(
            function(){
                getchat();
            }, 500);

      function getchat() {
        var incoming_id = $('input[name=incoming_id]').val();
        $.ajax({
          url: "{{ URL('/collegestudent/Messenger/getchat')}}"+'/'+incoming_id,
          id: incoming_id,
          method: 'get',
          success: function(response) {
            $(".chat-box").html(response);
          }
        });
      }
});


</script>
</body>

@endsection
