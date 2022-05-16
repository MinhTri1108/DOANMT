	<title>Trường ĐH Quy Nhơn</title>
	<meta charset="utf-8">
    <link rel="icon" href="https://daotao.qnu.edu.vn/Content/images/logoQuyNhon-icon.jpg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/sidebar.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
	<link rel="stylesheet" href="{{ asset('./font-awesome/css/all.css') }}">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="{{ asset('./js/sidebar.js') }}"></script>
<style>
    #ten{
        margin-top:16px;
        margin-left:16px;
    }
    .bg-info {
    background-color: #4723d9!important;
    }
    .toast{
        position: absolute;
        right: 0;
        top: 0;
        margin-left: 200px;
        background:  #4723d9;
        color: white;
    }
</style>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <!-- <div class="col-12 col-md-10">

        </div> -->
            <div class="noti">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class = "navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown notification-ui ">
                                    <div class="notifition">
                                    <a  onclick="myFunction()" class="nav-link dropdown-toggle notification-ui_icon" href="#" style ="display :flex;margin-left:-50px;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i style="margin-top: 5px;" class="fa fa-bell"> </i>&nbsp; Thông báo
                                        <!-- <p style="color:red;">{{$counttb}}</p>  -->
                                        @if($counttb>0)
                                        <span class="unread-notification"></span>
                                        @endif
                                    </a>
                                    <div id= "notification-ui_dd"  class="dropdown-menu notification-ui_dd " aria-labelledby="navbarDropdown">
                                        <div class="notification-ui_dd-header">
                                            <h3 class="text-center"><p style="color:red;">{{$counttb}}-Notification</p></h3>
                                        </div>
                                        <div class="notification-ui_dd-content">
                                            @foreach($notificationsv as $tbsv)
                                            <div class="notification-list notification-list--unread" id="showtoast-{{$tbsv->id}}" >
                                                <div class="notification-list_img">
                                                    <img src="https://www.publicdomainpictures.net/pictures/50000/nahled/bell-silhouette.jpg" alt="user">
                                                </div>
                                                <!-- <a href=""> -->
                                                    <div class="notification-list_detail">
                                                    <?php
                                                        $s = sprintf('%05d',$tbsv->MaAdmin);
                                                    ?>

                                                    <div
                                                    @if($tbsv->status == 1)
                                                    style="font-weight:bold;"
                                                    @endif

                                                    >
                                                        <p>{{$tbsv->matk}}<?php echo $s;?> đã gửi thông báo đến cho bạn</p>
                                                        <p><small>
                                                            <?php
                                                            \Carbon\Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
                                                            $date = \Carbon\Carbon::parse($tbsv->ThoiGian);
                                                            $elapsed = $date->diffForHumans(\Carbon\Carbon::now());
                                                            echo $elapsed;
                                                            ?>

                                                            </small></p>
                                                        </div>

                                                    </div>
                                                <!-- </a> -->
                                                <div class="notification-list_feature-img">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/526/526172.png" alt="Feature image">
                                                </div>
                                            </div>
                                                     <div class="toast" id="thongbaotoast-{{$tbsv->id}}" data-bs-autohide="false">
                                                <div class="toast-header">
                                                    <!-- ('D, d M \'y, H:i') -->
                                                    <strong class="me-auto"><i class="bi-gift-fill"></i> Thông báo của bạn!!!</strong>
                                                    <small>{{\Carbon\Carbon::parse($tbsv->ThoiGian)->format('H:i:s d:m:Y')}}</small>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                                </div>
                                                <div class="toast-body">
                                                    {{$tbsv->noidung}}
                                                </div>
                                            </div>

                                            <script>
                                                $(document).ready(function(){
                                                        $("#showtoast-{{$tbsv->id}}").click(function(){
                                                            $("#thongbaotoast-{{$tbsv->id}}").toast("show");
                                                            // console.log('{{$tbsv->id}}')
                                                        });
                                                    });
                                            </script>
                                            @endforeach
                                        </div>
                                        <div class="notification-ui_dd-footer" style="text-align: center;">
                                            <a href="{{route('thongbaosv')}}" class="btn btn-success btn-block">View All</a>
                                        </div>
                                    </div>
                                    </div>
                                </li>
                                    <li>
                                    <div class="header_img" >
                                        <img src="https://scontent.fdad3-1.fna.fbcdn.net/v/t1.6435-9/118675616_451215635838425_7444536993265624310_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=174925&_nc_ohc=OdL2TjHE1vYAX-sFMzh&_nc_ht=scontent.fdad3-1.fna&oh=00_AT9S-ErDYBTVtOJRSkOQDYuIHKPkJtFBpArewqDLZEIz_Q&oe=62875687" alt="">
                                    </div>
                                    </li>
                                <li>
                                <div class = "username">
                                    @foreach($datasv as $account)
                                    <a style= "text-decoration:none;"href="{{route('profilesv', [$account->MaSV])}}">
                                        <p id="ten">
                                            <?php
                                                $s = sprintf('%05d',$account->MaSV);
                                            ?>
                                                {{$account->fname}} {{$account->lname}}-[{{$account->permission->matk}}<?php echo $s ?>]


                                        </p>
                                    </a>
                                    @endforeach
                                </div>
                                <!-- Modal -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
    </header>
        <!-- menu -->

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="{{URL('collegestudent/')}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">QNUSSS</span> </a>
                <div class="nav_list">
                    <a href="{{URL('collegestudent/')}}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Trang chủ</span> </a>
                    <!-- <a href="{{route('BoxChat.index')}}" class="nav_link"> <i class='bx bx-message-rounded-dots nav_icon'></i> <span class="nav_name">Messager</span> </a> -->
                    <a href="{{route('indextkbsv')}}" class="nav_link"> <i class='bx bx-calendar nav_icon'></i> <span class="nav_name">Thời khóa biểu</span> </a>
                    <a href="{{route('ChuongTrinhDaoTao.index')}}" class="nav_link"> <i class='bx bx-notepad nav_icon'></i> <span class="nav_name">Chương trình đào tạo</span> </a>
                    <a href="{{route('dangkyhocphan')}}" class="nav_link"> <i class='bx bx-registered nav_icon'></i> <span class="nav_name">Đăng kí học phần</span> </a>
                    <a href="{{route('Marks.index')}}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bảng điểm</span> </a>
                    <a href="{{route('HocPhi.index')}}" class="nav_link"> <i class='bx bx-donate-blood nav_icon'></i> <span class="nav_name">Chi tiết học phí</span> </a>
                    <a href="{{route('messenger')}}" class="nav_link"> <i class='bx bxl-tux nav_icon'></i> <span class="nav_name">Nhắn tin</span> </a>
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-file nav_icon'></i> <span class="nav_name">Tài liệu của lớp học</span> </a> -->
                    <a href="{{route('qlchitiethp')}}" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Quản lý học phần</span></a>
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> -->
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

