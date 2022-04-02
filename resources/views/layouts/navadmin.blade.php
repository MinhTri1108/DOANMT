<link rel="stylesheet" type="text/css" href="{{ asset('./css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('./css/header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('./bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="../font-awesome/css/all.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">
    <a href="#" class="navbar-brand">
      <!-- Logo Image -->
      <img src="https://fea.qnu.edu.vn/Resources/imagesPortlet/9b78307b-f796-4c21-b2a2-33dabc1ea060/4ACPdb2FUtSOejZAYTFxg0EccaOBEEuK.jpeg" width="45" alt="" class="d-inline-block align-middle mr-2">
      <!-- Logo Text -->
      <span class="text-uppercase font-weight-bold">QNU</span>
      <style>
          img {
            border-radius:50%;
            moz-border-radius:50%;
            webkit-border-radius:50%;}
      </style>
    </a>
  <div class="collapse navbar-collapse" id="main_nav">
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">   Quản lý tài khoản  </a>
		    <ul class="dropdown-menu fade-up">
			  <li><a class="dropdown-item" href="{{route('AdminAccounts.index')}}">Danh sách tài khoản ADMIN</a></li>
			  <li><a class="dropdown-item" href="{{route('LecturersAccounts.index')}}">Danh sách tài khoản GIẢNG VIÊN</a></li>
		    </ul>
		</li>
        <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Quản lý đào tạo  </a>
		    <ul class="dropdown-menu fade-up">
			  <li><a class="dropdown-item" href="{{route('DanhSachKhoa.index')}}"> Chương trình đào tạo</a></li>
			  <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
		    </ul>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Quản lý chung  </a>
		    <ul class="dropdown-menu fade-up">
			  <li><a class="dropdown-item" href="#"> Sự kiện </a></li>
			  <li><a class="dropdown-item" href="#"> Abc </a></li>
			  <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
		    </ul>
		</li>
        <li class="nav-item"><a class="nav-link" href="#"> Gửi thông báo </a></li>
	</ul>

	<ul class="navbar-nav ms-auto">
		<!-- <li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li>
		<li class="nav-item"><a class="nav-link" href="#"> Menu item </a></li> -->
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Người dùng </a>
		    <ul class="dropdown-menu dropdown-menu-end fade-down">
			  <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
			  <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
		    </ul>
		</li>
	</ul>
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>
