<link rel="stylesheet" type="text/css" href="{{ asset('./css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('./css/sidebar.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.31/vue.cjs.js"></script> -->
    <!-- <script src="//cdn.jsdelivr.net/npm/vue@2.6.14"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.4.1/socket.io.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.4/echo.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.4/dist/echo.min.js"></script> -->
    <link rel="stylesheet" href="{{ asset('./font-awesome/css/all.css') }}">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <!-- <script src="http://localhost:8098"></script> -->
<script type="text/javascript" src="{{ asset('./js/sidebar.js') }}"></script>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_img">
            <img src="https://bizweb.dktcdn.net/100/409/603/files/bao-gia-in-anh-the-lay-ngay.jpg?v=1631007146881" alt="">
        </div>

    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">QNUSSS</span> </a>
                <div class="nav_list">
                    <a href="{{URL('collegestudent/')}}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Trang chủ</span> </a>
                    <a href="{{route('messenger')}}" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Messager</span> </a>
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

