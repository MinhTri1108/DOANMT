<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cổng thông tin sinh viên QNU</title>
    </head>
<head>
	<title>Trường ĐH Quy Nhơn</title>
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
      <div class="d-flex">
        <a class="nav-link" href="{{URL('/login')}}" style="margin-left: 1200px;color: #f8f9fa!important;text-decoration: none"><i class='bx bxs-arrow-to-right bx-fade-right' ></i> Login</a>
    </div>
    </div>
  </div>
</nav>
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
                                    <input type="text" name="name" class="form-control" id="" required>
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
