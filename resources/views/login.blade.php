@extends('layouts.header')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('./css/login.css') }}">
	<div id="login">
		<form action="{{route('login')}}" method="POST" role="" id="form-login">
			{{ csrf_field() }}
            <h2 class="form-heading"> Đăng nhập </h2>

				<div class="form-group">
					<i class="fas fa-user"></i>
					<input type = "text" name="MaTK" placeholder = "Mã sinh viên" class="form-input">
				</div>
				<div class="form-group">
					<i class="fas fa-key"></i>
					<input type = "password" name="password" placeholder = "Mật khẩu" class="form-input">
					<div id="eye">
					<i class="fas fa-eye"></i>
					</div>
				</div>
                <div class="input-group  ml-5 mt-2" >
                    @if ( Session::has('error') )
                        <p style="color: red">{{ Session::get('error') }}</p>
                    @endif
                </div>
				<button class="form-submit" name='dn'>Đăng nhập</button>
		</form>
	</div>
	<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous">

	</script>
    <script>
        $(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('show');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye')
        if($(this).hasClass('show')){
            $(this).prev().attr('type', 'test');
        }
        else{
            $(this).prev().attr('type', 'password');
        }
    });
});
    </script>
@endsection
