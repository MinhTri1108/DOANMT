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
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <div class="dropdown" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown notification-ui">
                                <a class="nav-link dropdown-toggle notification-ui_icon" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell"></i> Thông báo
                                    <span class="unread-notification"></span>
                                </a>
                                <div class="dropdown-menu notification-ui_dd" aria-labelledby="dropdownMenuLink">
                                    <div class="notification-ui_dd-header">
                                        <h3 class="text-center">Notification</h3>
                                    </div>
                                    <div class="notification-ui_dd-content">
                                        <div class="notification-list notification-list--unread">
                                            <div class="notification-list_img">
                                                <img src="https://i.imgur.com/zYxDCQT.jpg" alt="user">
                                            </div>
                                            <div class="notification-list_detail">
                                                <p><b>John Doe</b> reacted to your x</p>
                                                <p><small>10 mins ago</small></p>
                                            </div>
                                            <div class="notification-list_feature-img">
                                                <img src="https://i.imgur.com/AbZqFnR.jpg" alt="Feature image">
                                            </div>
                                        </div>
                                        <div class="notification-list notification-list--unread">
                                            <div class="notification-list_img">
                                                <img src="https://i.imgur.com/w4Mp4ny.jpg" alt="user">
                                            </div>
                                            <div class="notification-list_detail">
                                                <p><b>Richard Miles</b> reacted to your post</p>
                                                <p><small>1 day ago</small></p>
                                            </div>
                                            <div class="notification-list_feature-img">
                                                <img src="https://i.imgur.com/AbZqFnR.jpg" alt="Feature image">
                                            </div>
                                        </div>
                                        <div class="notification-list">
                                            <div class="notification-list_img">
                                                <img src="https://i.imgur.com/ltXdE4K.jpg" alt="user">
                                            </div>
                                            <div class="notification-list_detail">
                                                <p><b>Brian Cumin</b> reacted to your post</p>
                                                <p><small>1 day ago</small></p>
                                            </div>
                                            <div class="notification-list_feature-img">
                                                <img src="https://i.imgur.com/bpBpAlH.jpg" alt="Feature image">
                                            </div>
                                        </div>
                                        <div class="notification-list">
                                            <div class="notification-list_img">
                                                <img src="https://i.imgur.com/CtAQDCP.jpg" alt="user">
                                            </div>
                                            <div class="notification-list_detail">
                                                <p><b>Lance Bogrol</b> reacted to your post</p>
                                                <p><small>1 day ago</small></p>
                                            </div>
                                            <div class="notification-list_feature-img">
                                                <img src="https://i.imgur.com/iIhftMJ.jpg" alt="Feature image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-ui_dd-footer">
                                        <a href="#!" class="btn btn-success btn-block">View All</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
        </nav>
        <div class="header_img">
            <img src="https://bizweb.dktcdn.net/100/409/603/files/bao-gia-in-anh-the-lay-ngay.jpg?v=1631007146881" alt="">
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

