<link rel="stylesheet" type="text/css" href="{{ asset('./css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('./css/sidebar.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
	<link rel="stylesheet" href="{{ asset('./font-awesome/css/all.css') }}">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script type="text/javascript" src="{{ asset('./js/sidebar.js') }}"></script>
<style>
    #ten{
        margin-top:16px;
        margin-left:16px;
    }
</style>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        <!-- <div class="col-12 col-md-10">

        </div> -->

        <div class="col-12 col-md-2 d-flex">
            <div class="noti">
           <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown notification-ui ">
                            <a  onclick="myFunction()" class="nav-link dropdown-toggle notification-ui_icon" href="#" style ="display :flex;margin-left:-50px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i style="margin-top: 5px;" class="fa fa-bell"> </i><p style="color:red;">{{$counttb}}</p> &nbsp; Thông báo
                                <span class="unread-notification"></span>
                            </a>
                            <div id= "notification-ui_dd"  class="dropdown-menu notification-ui_dd " aria-labelledby="navbarDropdown">
                                <div class="notification-ui_dd-header">
                                    <h3 class="text-center"><p style="color:red;">{{$counttb}}-Notification</p></h3>
                                </div>
                                <div class="notification-ui_dd-content">
                                    @foreach($tbgvs as $tbgv)
                                    <div class="notification-list notification-list--unread">
                                        <div class="notification-list_img">
                                            <img src="https://i.imgur.com/zYxDCQT.jpg" alt="user">
                                        </div>
                                        <a href=""><div class="notification-list_detail">
                                            <?php
                                                $s = sprintf('%05d',$tbgv->MaAdmin);
                                            ?>

                                            <div
                                            @if($tbgv->status == 1)
                                            style="font-weight:bold;"
                                            @endif

                                            >
                                                <p>{{$tbgv->matk}}<?php echo $s;?> reacted to your post</p>
                                                <p><small>{{$tbgv->ThoiGian}}</small></p>
                                            </div>

                                        </div></a>
                                        <div class="notification-list_feature-img">
                                            <img src="https://cdn-icons-png.flaticon.com/512/526/526172.png" alt="Feature image">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="notification-ui_dd-footer">
                                    <a href="#!" class="btn btn-success btn-block ">View All</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
        </div>
        <div class="header_img" style="margin-top : 10px;display:flex;">
            <img src="https://bizweb.dktcdn.net/100/409/603/files/bao-gia-in-anh-the-lay-ngay.jpg?v=1631007146881" alt="">
        </div>
        <p id="ten">1234565678-doan minh tri</p>
        </div>


    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">QNUSSS</span> </a>
                <div class="nav_list">
                    <a href="{{URL('lecturers/')}}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Trang chủ</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Thời khóa biểu</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Group Lớp</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Tài liệu</span> </a>
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name"></span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> -->
                </div>
            </div>
            <a href="{{route('logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Đăng xuất</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light" style= "margin-top:5rem;">
        <div >
            @yield('content')
        </div>
    </div>
    <!--Container Main end-->

