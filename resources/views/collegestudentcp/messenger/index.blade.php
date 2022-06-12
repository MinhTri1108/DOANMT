@extends('layouts.sidebarsv')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('./css/message.css') }}">
<style>
    a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
    }
</style>
<body>
  <div class="wrapper">
    <div class="users">
        <div class="search">
            <span class="text">Tìm kiếm bạn bè</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
    </div>
    <div class="users" style="margin-top:10px;">
        <!-- <div class="search">
            <span class="text">Box Chat</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div> -->
        <div class="users-list1">

        </div>
    </div>
  </div>
<script type="text/javascript" src="{{ asset('./js/friendw.js') }}"></script>
<!-- <script src="../js/.js"></script> -->
<script >
    $(function(){
       $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        fetchAllSV();

      function fetchAllSV() {
        $.ajax({
          url: '{{ route('datafriend') }}',
          method: 'get',
          success: function(response) {
            $(".users-list").html(response);

          }
        });
      }
   })
</script>
@endsection
