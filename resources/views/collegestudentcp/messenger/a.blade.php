<!--
$output = "";
        // print_r($listsv);
        // echo '<pre>';
        // dd($demlistsv); -->
        @if($demlistsv== 0)
            <!-- $output .= "No users are available to chat";
            echo $output; -->
            <p>No users are available to chat</p>
        @else if($demlistsv > 0)

            // dd($listsv);
            @foreach($listsv as $listsinhvien)
                <?php
                $mess = Messages::where(function ($query) use ($idsv, $listsinhvien) {
                        $query->where('incoming_msg_id', $listsinhvien->MaSV)
                            ->where('outgoing_msg_id', $idsv);
                })
                ->orWhere(function ($query) use ($idsv, $listsinhvien)  {
                        $query->where('outgoing_msg_id', $listsinhvien->MaSV)
                            ->where('incoming_msg_id', $idsv);
                })->orderBy('id','desc')->limit(1)->get();
                ($mess->count()>0) ? $result = $mess->first()->msg : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if($idsv == '$mess->fisrt()->outgoing_msg_id')
                {
                    ($idsv == $mess->fisrt()->outgoing_msg_id) ? $you = "Bạn: " : $you = "";
                }
                else
                {
                     $you = "";
                }
                ('$listsv->fisrt()->Status' == 'Offline now') ? $offline = "offline" : $offline = "";
                ($idsv == '$listsinhvien->MaSV') ? $hid_me = "hide" : $hid_me = "";
                ?>


                <a href="">
                            <div class="content">
                            <img src="php/images/'. $listsinhvien->MaSV .'" alt="">
                            <div class="details">
                                <span>{{$listsinhvien->fname}}{{$listsinhvien->lname}}</span>
                                <p>{{$you}} {{$msg}}</p>
                            </div>
                            </div>
                            <div class="status-dot
                            <?php
                            if("$listsv->fisrt()->Status" == "Offline now")
                            {
                                echo "offline";
                            }else
                            {
                                echo "";
                            }
                            ?>
                            "><i class="fas fa-circle"></i></div>
                        </a>
            @endforeach

        @endif
            // echo $output;
