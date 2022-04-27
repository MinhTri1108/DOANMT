@extends('layouts.sidebargv')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('./css/thoikhoabieu.css') }}"> -->
<div class="content" style = "margin-top: 10px;">
    <div class="container">
        <div class="row justify-content-center"><h1 class="text-center">Thời Khóa Biểu</h1></div>
            <div class="row ">
                <select id="mySelect" class="form-control" name = "hocki" onchange="location = this.value;">
                    <option class="text-center" value="" disabled selected>Học kì{{$hockiht}}</option>
                    @foreach($hocki as $hk)
                    <option class="text-center" value="{{route('viewtkb', $hk->HocKi)}}"><a href="">Học kì: {{$hk->HocKi}}</a></option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="container"  style = "margin-top: 10px;">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb30">
            <table class="timetable table table-striped ">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Phòng</th>
                        <th scope="col">Monday</th>
                        <th scope="col">Tuesday</th>
                        <th scope="col">Wednesday</th>
                        <th scope="col">Thursday</th>
                        <th scope="col">Friday</th>
                        <th scope="col">Saturday</th>
                        <th scope="col">Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phonghoc as $ph)
                     @php($dem= \App\Models\LichHoc::where('idhocphan', $ph->idhocphan)->count('idhocphan'))
                    <tr class="text-center">
                        <td rowspan="{{$dem}}" >{{$ph->SoPhong}}</td>
                        @foreach($check->where('idphong', '=', $ph->idphong) as $ck)
                            <!-- {{$classes[$ck->idthu]=$ck;}} -->
                            @foreach($week_days as $day)
                                @if($day == $classes[$ck->idthu]->idthu)
                                <td style = "background-color: #4723d9; color: white;">
                                    Môn: {{$classes[$ck->idthu]['TenMonHoc']}}
                                    <br>
                                    Mã HP: {{$classes[$ck->idthu]['idhocphan']}}- {{$classes[$ck->idthu]['TietHoc']}}
                                    <br>
                                    Start: {{$classes[$ck->idthu]['GioHocBD']}}-End: {{$classes[$ck->idthu]['GioHocKT']}}
                                </td>

                                @else
                                <td></td>
                                @endif
                            @endforeach
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>

</div>
@endsection
