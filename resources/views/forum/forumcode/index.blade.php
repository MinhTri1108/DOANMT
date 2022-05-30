<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cổng thông tin sinh viên QNU</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('./css/cmt.css') }}">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('./css/reset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('./css/header.css') }}">
        <link rel="icon" href="https://daotao.qnu.edu.vn/Content/images/logoQuyNhon-icon.jpg" type="image/x-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="{{ asset('./font-awesome/css/all.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

        <link rel="stylesheet" type="text/css" href="{{ asset('./bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body class="bg-light">
	<div id = "wrapper">
        <div id="DIV_7">

            <img id="IMG_8" src="http://daotao.qnu.edu.vn/Content/images/logoQuyNhon.png" alt='' style="width: 100%;"/>
        </div>
</div>
<hr>
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
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid" style="color: #f8f9fa!important">
    <a  style="color: #f8f9fa!important" class="navbar-brand" href="{{URL('/')}}">Cổng thông tin QNU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex" style="color: #f8f9fa!important;">

            @if(session()->has('id_account'))
            <li class="nav-item dropdown d-flex"  style="margin-left: 1000px;color: #f8f9fa!important;">
                <div class="header_img" >
                    <img src="https://bizweb.dktcdn.net/100/409/603/files/bao-gia-in-anh-the-lay-ngay.jpg?v=1631007146881" alt="">
                </div>
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                @foreach($dataad as $account)
                <?php
                    $s = sprintf('%05d',$account->MaAdmin);
                ?>
                    {{$account->fname}} {{$account->lname}}-[{{$account->permission->matk}}<?php echo $s ?>]

                @endforeach
                </a>
                <ul class="dropdown-menu dropdown-menu-end fade-down">
                <li><a class="dropdown-item" href="#"> Đổi mật khẩu</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}"> Đăng xuất</a></li>
                </ul>
            </li>
            @elseif(session()->has('id_gv'))
            <li class="nav-item dropdown d-flex"  style="margin-left: 1000px;color: #f8f9fa!important;">
                <div class="header_img" >
                    <img src="https://bizweb.dktcdn.net/x100/409/603/files/bao-gia-in-anh-the-lay-ngay.jpg?v=1631007146881" alt="">
                </div>
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                @foreach($data as $account)
                <?php
                    $s = sprintf('%05d',$account->MaGV);
                ?>
                    {{$account->fname}} {{$account->lname}}-[{{$account->permission->matk}}<?php echo $s ?>]

                @endforeach
                </a>
                <ul class="dropdown-menu dropdown-menu-end fade-down">
                <li><a class="dropdown-item" href="#"> Đổi mật khẩu</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}"> Đăng xuất</a></li>
                </ul>
            </li>
            @elseif(session()->has('id_sv'))
            <li class="nav-item dropdown d-flex"  style="margin-left: 1000px;color: #f8f9fa!important;">
                <div class="header_img" >
                    <img src="https://bizweb.dktcdn.net/100/409/603/files/bao-gia-in-anh-the-lay-ngay.jpg?v=1631007146881" alt="">
                </div>
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                @foreach($datasv as $account)
                <?php
                    $s = sprintf('%05d',$account->MaSV);
                ?>
                    {{$account->fname}} {{$account->lname}}-[{{$account->permission->matk}}<?php echo $s ?>]

                @endforeach
                </a>
                <ul class="dropdown-menu dropdown-menu-end fade-down">
                <li><a class="dropdown-item" href="#"> Đổi mật khẩu</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}"> Đăng xuất</a></li>
                </ul>
            </li>
            @else
            <a  class="nav-link" href="{{URL('/login')}}" style="margin-left: 1200px;color: #f8f9fa!important;"><i class='bx bxs-arrow-to-right bx-fade-right' ></i> Login</a>
            @endif
        </div>
    </div>
  </div>
</nav>
<div class="container-fluid w-90 p-3 ">
<div class="row mt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card shadow ml-3">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Diễn đàn Coder <b style="color: #70ff00;">"Nơi kết nối, giao lưu, trao đổi của các sinh viên"</b></h3>
                        <button class="btn btn-light"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadfile">Đăng bài</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="uploadfile" tabindex="-1" aria-labelledby="uploadfileLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadfileLabel">Tạo bài viết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @if(session()->has('id_account') || session()->has('id_gv') ||session()->has('id_sv'))
                        <form  method="post" id="post_file_form" action="{{route('poststatus')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">File or Img:</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="file[]" multiple>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Nội dung: </label>
                                    <textarea name ="content"class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Câu hỏi của bạn là gì thế?" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="post_file_btn" class="btn btn-primary">Đăng bài viết</button>
                            </div>
                        </form>
                        @else
                            <div class="modal-body">
                                <div>
                                    <p><b>Bạn vui lòng login để giao lưu với mọi người!!!</b></p>
                                    <p><a  style="text-decoration: none" href="{{URL('/login')}}">Đi đến "LOGIN"</a></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        @endif
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
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
                    @foreach($showpost as $show)
                        <div class="card-body" id="list">
                            <div class="container">
                                <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col">
                                        <div class="card shadow ml-3" style="background: #dee6ef">
                                            <div class="d-flex justify-content-between p-2 px-3">
                                                <div class="d-flex flex-row align-items-center">
                                                    <img src="https://iweb247.com/uploads/images/1(31).jpg" width="50" class="rounded-circle">
                                                    <div class="d-flex flex-column ml-2">
                                                        <span class="font-weight-bold">{{$show->masvpost->fname}} {{$show->masvpost->lname}} </span>
                                                        <small class="text-primary">Sinh viên {{$show->idposts}}</small>
                                                     </div>
                                                </div>
                                                <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2" style="color: black;">

                                                <?php
                                                    \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
                                                    $date = \Carbon\Carbon::parse($show->time);
                                                    $elapsed = $date->diffForHumans(\Carbon\Carbon::now());
                                                    echo $elapsed;
                                                ?>
                                                </small>&emsp;<i class="fa fa-ellipsis-h"></i> </div>
                                            </div>
                                            <div class="row" style="row-gap :20px">
                                                @foreach($getpost->where('MaSV', $show->MaSV)->where('content', $show->content)->where('time', $show->time) as $get)
                                                <!-- {{$get}} -->
                                                    @switch(pathinfo($get->attached, PATHINFO_EXTENSION))
                                                        @case('png')
                                                        <div class="col-6 col-md-4">
                                                            <a href="{{asset('./filepostscoder/'.$get->attached)}}"><img src="{{asset('./filepostscoder/'.$get->attached)}}" class="img-fluid"></a>
                                                        </div>
                                                            @break
                                                        @case('jpg')
                                                        <div class="col-6 col-md-4">
                                                            <a href=""><img src="{{asset('./filepostscoder/'.$get->attached)}}" class="img-fluid"></a>
                                                        </div>
                                                            @break
                                                        @case('jpeg')
                                                        <div class="col-6 col-md-4">
                                                            <a href=""><img src="{{asset('./filepostscoder/'.$get->attached)}}" class="img-fluid"></a>
                                                        </div>
                                                            @break
                                                        @default
                                                        <div>
                                                            <a href="{{asset('./filepostscoder/'.$get->attached)}}">{{$get->attached}},</a>
                                                        </div>
                                                            @break
                                                    @endswitch
                                                @endforeach
                                            </div>
                                            <div class="p-2">
                                                <h4 class="text-justify" style="text-size:20px">{{$show->content}}</h4>
                                                <hr>
                                                  <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex flex-row icons d-flex align-items-center"> <i class="fa fa-heart"></i> <i class="fa fa-smile-o ml-2"></i> </div>
                                                    <div class="d-flex flex-row muted-color" style="color: black;"> <span>{{$getcmt->where('idposts', $get->idposts)->count()}} comments</span>&emsp;<span class="ml-2">Share</span> </div>
                                                </div>
                                                <hr>
                                                <div class="comments" id= "comments">
                                                    @foreach($getpost->where('MaSV', $show->MaSV)->where('content', $show->content)->where('time', $show->time) as $getpt)
                                                        @foreach($getcmt->where('idposts', $getpt->idposts) as $cmt)
                                                        @php($quyen = \App\Models\Permission::where('matk', $cmt->matk)->first())
                                                            @switch($cmt->matk)
                                                                @case('02021')
                                                                    @php($name = \App\Models\AdminAccounts::where('idloaitk', $quyen->idloaitk)->where('MaAdmin',$cmt->iduser)->first())
                                                                    <div class="d-flex flex-row mb-2"> <img src="{{asset('./avatar/'.$name->avatar)}}" width="40" class="rounded-image">
                                                                        <div class="d-flex flex-column ml-2"> <span class="name">ADM: {{$name->fname}} {{$name->lname}}</span> <small class="comment-text"> {{$cmt->content}}</small>
                                                                    @break
                                                                @case('12021')
                                                                    @php($name = \App\Models\LecturersAccounts::where('idloaitk', $quyen->idloaitk)->where('MaGV',$cmt->iduser)->first())
                                                                    <div class="d-flex flex-row mb-2"> <img src="{{asset('./avatar/'.$name->avatar)}}" width="40" class="rounded-image">
                                                                        <div class="d-flex flex-column ml-2"> <span class="name">GV: {{$name->fname}} {{$name->lname}}</span> <small class="comment-text"> {{$cmt->content}}</small>

                                                                    @break
                                                                @case('22021')
                                                                    @php($name = \App\Models\CollegeStudentAccounts::where('idloaitk', $quyen->idloaitk)->where('MaSV',$cmt->iduser)->first())
                                                                    <div class="d-flex flex-row mb-2"> <img src="{{asset('./avatar/'.$name->avatar)}}" width="40" class="rounded-image">
                                                                        <div class="d-flex flex-column ml-2"> <span class="name">SV: {{$name->fname}} {{$name->lname}}</span> <small class="comment-text"> {{$cmt->content}}</small>

                                                                    @break
                                                                @default
                                                                    @break
                                                            @endswitch
                                                                <div class="d-flex flex-row align-items-center status">
                                                                    <small><i class='bx bxs-like'></i>Like</small>
                                                                    <small>Reply</small>
                                                                    <small><?php
                                                                        \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
                                                                        $date = \Carbon\Carbon::parse($cmt->time);
                                                                        $elapsed = $date->diffForHumans(\Carbon\Carbon::now());
                                                                        echo $elapsed;
                                                                    ?></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                 @endforeach
                                                    <div class="comment-input">
                                                        <form action="{{route('repcmt')}}" method="post">
                                                            @csrf
                                                            <div style="display: none;">
                                                                <input type="text" name="idposts" id="" value="{{$getpt->idposts}}">
                                                            </div>
                                                            <input type="text" name="content" class="form-control" placeholder="Viết bình luận..." required>
                                                            <div class="fonts">
                                                                <button type="submit"  class="btn btn-primary"><i class='bx bx-send' ></i></button>
                                                            </div>
                                                        </form>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.js" integrity="sha512-/xb5+PNOA079FJkngKI2jvID5lyiqdHXaUUcfmzE0X0BdpkgzIWHC59LOG90a2jDcOyRsd1luOr24UCCAG8NNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
     var element = document.getElementById("comments");
    element.scrollTop = element.scrollHeight ;
    var socket = io('http://127.0.0.1:6001', { transports: ['websocket'] })

    socket.on('laravel_database_chat:message', function(data){
        // console.log(data)
        if($('#'+data.id).length == 0){
         $('#comments').append(
             '<p><strong>'+data.name+'</strong>: '+data.msg+'</p>'
             )
        return false;
        }else
        {
            console.log('Da co tin nhan');
        }
    })
</script>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted" style = "margin-top: 100px">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Kết nối với tôi trên các mạng xã hội:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="https://www.facebook.com/dmt.1108" class="me-4 text-reset">Minh Trí
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="https://www.instagram.com/dmt.1108/" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="https://github.com/MinhTri1108" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">PHP</a>
          </p>
          <p>
            <a href="#!" class="text-reset">HTML</a>
          </p>
          <p>
            <a href="#!" class="text-reset">JS</a>
          </p>
          <p>
            <a href="#!" class="text-reset">BOOTSTRAP/CSS</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p>
            <i class="fas fa-home me-3"></i>
            Quy Nhơn- Bình Định
          </p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            minhtridoan118@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> 0396305400</p>
          <!-- <p><i class="fas fa-print me-3"></i> NULL</p> -->
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</footer>
<!-- Footer -->
</html>

