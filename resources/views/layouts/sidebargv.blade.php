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
<script type="text/javascript" src="{{ asset('./js/sidebar.js') }}"></script>
<style>
    #ten{
        margin-top:16px;
        margin-left:16px;
    }
    .bg-info {
    background-color: #4723d9!important;
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
                                            @foreach($notificationgv as $tbgv)
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
                                                        <p>{{$tbgv->matk}}<?php echo $s;?> đã gửi thông báo đến cho bạn</p>
                                                        <p><small>{{$tbgv->ThoiGian}}</small></p>
                                                    </div>

                                                </div></a>
                                                <div class="notification-list_feature-img">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/526/526172.png" alt="Feature image">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="notification-ui_dd-footer" style="text-align: center;">
                                            <a href="#!" class="btn btn-success btn-block">View All</a>
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
                                <div class = "username" data-bs-toggle="modal" data-bs-target="#profile">
                                    <p id="ten">@foreach($data as $account)
                                    <?php
                                        $s = sprintf('%05d',$account->MaGV);
                                    ?>
                                        {{$account->fname}} {{$account->lname}}-[{{$account->permission->matk}}<?php echo $s ?>]

                                    @endforeach
                                </p>
                                </div>
                                <!-- Modal -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
    </header>
    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="profileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileLabel">Thông tin cá nhân</h5>
                <button style="color: white; margin-left: 20px;" class="btn bg-info" data-bs-toggle="modal" data-bs-target="#changepass">Đổi mật Khẩu</button>
                <button style="color: white; margin-left: 20px;" class="btn bg-info" onclick="editprofile()">Edit</button>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @foreach($data as $account)
            <form action="{{route('updateprofile', [$account->MaGV])}}" method="post">
                @method("PUT")
            @csrf
            <div class="modal-body">

                <?php
                    $s = sprintf('%05d',$account->MaGV);
                ?>
                <div class="row" >
                    <div class="col-md-6">
                        <label for="fname">Avatar</label>
                        <img class="header_img" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t1.6435-9/118675616_451215635838425_7444536993265624310_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=174925&_nc_ohc=OdL2TjHE1vYAX-sFMzh&_nc_ht=scontent.fdad3-1.fna&oh=00_AT9S-ErDYBTVtOJRSkOQDYuIHKPkJtFBpArewqDLZEIz_Q&oe=62875687" alt="">
                        <input name="avatar" id="avatar" type="file" value="{{$account->avatar}}" id="" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="MaGV">Mã giảng viên</label>
                        <input name="MaGV" id="MaGV" type="text" class="form-control" value="{{$account->permission->matk}}<?php echo $s?>" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fname">Họ</label>
                        <input name="fname" id="fname" type="text" class="form-control" value="{{$account->fname}}"disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="lname">Tên</label>
                        <input name="lname" id="lname" type="text" class="form-control" value="{{$account->lname}}"disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fname">Ngày sinh</label>
                        <input name="NgaySinh" id="NgaySinh" type="date" class="form-control" value="{{$account->NgaySinh}}"disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="fname">CCCD</label>
                        <input name="cccd" id="cccd" type="text" class="form-control" value="{{$account->cccd}}"disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fname">Giới tính</label>
                        <input name="GioiTinh" id="GioiTinh" type="text" class="form-control" value="{{$account->GioiTinh}}"disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="fname">Email</label>
                        <input name="Email" id="Email" type="text" class="form-control" value="{{$account->Email}}"disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="fname">Địa chỉ</label>
                        <input name="DiaChi" id="DiaChi" type="text" class="form-control" value="{{$account->DiaChi}}"disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="fname">Số điện thoại</label>
                        <input name="SDT" id="SDT" type="text" class="form-control" value="{{$account->SDT}}"disabled>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
            </form>
            @endforeach
        </div>
        </div>
        <script>
            function editprofile()
            {
                 document.getElementById("avatar").disabled = false;
                 document.getElementById("MaGV").disabled = false;
                 document.getElementById("fname").disabled = false;
                 document.getElementById("lname").disabled = false;
                 document.getElementById("NgaySinh").disabled = false;
                 document.getElementById("cccd").disabled = false;
                 document.getElementById("GioiTinh").disabled = false;
                 document.getElementById("Email").disabled = false;
                 document.getElementById("DiaChi").disabled = false;
                 document.getElementById("SDT").disabled = false;
            }
        </script>
        <!-- endmodalsprofile -->
        <!-- modalschangepass -->
        <!-- <div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="changepassLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changepassLabel">Đổi mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach($data as $account)
                <form action="{{route('updatechangepass', [$account->MaGV])}}" method="post">
                    @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="fname">Mã giảng viên</label>
                        <input type="text" class="form-control" value="{{$account->permission->matk}}<?php echo $s?>" disabled>
                    </div><div class="col-md-12">
                        <label for="fname">Password_Old</label>
                        <input type="password" name="passold" class="form-control" >
                    </div><div class="col-md-12">
                        <label for="fname">Password_NEW</label>
                        <input type="password" name="passnew" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

                </div>
                @endforeach
            </div>
            </div> -->
        <!-- endchangepass -->
        <!-- menu -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="{{URL('lecturers/')}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">QNUSSS</span> </a>
                <div class="nav_list">
                    <a href="{{URL('lecturers/')}}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Trang chủ</span> </a>
                    <a href="{{route('indextkbgv')}}" class="nav_link"> <i class='bx bx-spreadsheet nav_icon' ></i> <span class="nav_name">Thời khóa biểu</span> </a>
                    <a href="{{route('Lop.index')}}" class="nav_link"> <i class='bx bx-group nav_icon' ></i> <span class="nav_name">Group Lớp</span> </a>
                    <a href="{{route('UploadFileTaiLieu.create')}}" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Tài liệu</span> </a>
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

