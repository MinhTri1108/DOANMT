@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    #caption{
        background-color:#0202025c;
    }
    #slide{
        border-radius : 0px;
    }
</style>
<body class="bg-light">
<div class="container-fluid w-90 p-3 ">
<div class="row mt-5">
    <div class="col-12">
        <div class="row">
            <div class="col-8">
                <div class="card shadow ml-3">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Danh sách tuyển dụng</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" style = "row-gap :20px">
                            @foreach($lichs as $key=> $lich)
                            <div class="col-6"  id = "test">
                                <a href="">
                                    <div class="dssv">
                                        <img id="slide" src="{{$lich->images}}" class="d-block w-100"style="height: 500px;" >
                                        <div >
                                            <h5 id = "noidung">{{$lich->NoiDung}}</h5>
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
            <div class="col-4">
                <div class="card shadow ml-3" style="position: fixed;">
                    <div class="card-header bg-info d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Box</h3>
                    </div>
                    <div class="card-body" style= "height: auto;max-height: 400px;overflow-x: hidden;">
                        <div class="row" style = "row-gap :20px">
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>

                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                            <td>kwjqopeqoweiqwpeoqpweiqweopqew</td>
                        </div>
                    </div>
                    <div>
                        <form action="" method="post">
                            <label for="">abc</label>
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</body>

@endsection
