<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
	<a class="navbar-brand" href="indexadmin.php"><i class="fas fa-home"></i>_Trường DH Quy Nhơn</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
<div class="container-fluid container-edit">
	<div class="navbar-collapse collapse " id="navbarSupportedContent">
		<ul class="nav navbar-nav">
			<!-- <li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			</li> -->

			<li class="nav-item dropdown">
				<a class="nav-link" href="#" id="navbarDropdown" ><i class="fas fa-file-alt"></i> Quản lý tài khoản</a>
				<div class="dropdown-content">
					<ul class="sub-menu">
						<li><a class="dropdown-item" href="{{route('AdminAccounts.index')}}">Danh sách tài khoản ADMIN</a></li>
						<li><a class="dropdown-item" href="listaccountgv.php">Danh sách tài khoản GIẢNG VIÊN</a></li>
						<li><a class="dropdown-item" href="listaccountsv.php">Danh sách tài khoản SINH VIÊN</a></li>
					</ul>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link" href=""><i class="fas fa-list-ul"></i> Quản lý Học Phần</a>
				<div class="dropdown-content">
					<ul class="sub-menu">
						<li><a class="dropdown-item" href="listhocphan.php">Danh sách học phần</a></li>
						<li><a class="dropdown-item" href="listctdtlop.php">Danh sách chương trình đào tạo</a></li>
					</ul>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link" href=""><i class="fas fa-chalkboard-teacher"></i> Quản lý chung</a>
				<div class="dropdown-content">
					<ul class="sub-menu">
						<li><a class="dropdown-item" href="listkhoa.php">Quản lý khoa</a></li>
						<li><a class="dropdown-item" href="updatelichlamviec.php">Quản lý lịch làm việc</a></li>
						<li><a class="dropdown-item" href="">Quản lý thiết bị</a></li>
					</ul>
				</div>
			</li>

			<li  class="nav-item">
				<a class="nav-link" href="guithongbao.php"><i class="fas fa-bell"></i> Gửi thông báo</a>
			</li>
		</ul>
	</div>

</div>
</nav>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
			<h4 class="modal-title" style = "">Đổi mật khẩu</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="../changepass.php" method = "POST">
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<label>Mã admin</label>
					<input type="text" class="form-control" placeholder="" name = "ma" value = "" readonly = "true">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Mật khẩu cũ</label>
					<input type="password" class="form-control" placeholder="" name ="passwordold">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Mật khẩu mới</label>
					<input type="password" class="form-control" placeholder="" name ="passwordnew">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Nhập lại mật khẩu mới</label>
					<input type="password" class="form-control" placeholder="" name ="respasswordnew">
				</div> <!-- form-group end.// -->
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name = "changepass">Save changes</button>
			</div>
		</form>

      </div>
    </div>
  </div>

</div>
