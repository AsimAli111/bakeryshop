<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
<body class="home">
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
            <div class="logo">
                <a hef="home.html"><img style="border-radius: 50%;height: 130px;width: 95px" src="{{asset('5.jpeg')}}" alt="merkery_logo" class="hidden-xs hidden-sm">
                </a>
            </div>
            <div class="navi">
                <ul class="elements">
                    <li class="home_page"><a href="home"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Əsas</span></a></li>
                    <li class="product_page"><a href="product"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Məhsullar</span></a></li>
                    <li class="person_page"><a href="person" class="task"><i class="fa fa-users" aria-hidden="true"></i><span class="hidden-xs hidden-sm">İşçilər</span></a></li>
                    <li class="order_page"><a href="order"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Sifarişlər</span></a></li>
                    <li class="message_page"><a href="message"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Mesajlar</span></a></li>
                    <li class="msks_page"><a href="msk"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="hidden-xs hidden-sm">MSK</span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 col-sm-11 display-table-cell v-align">
            <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
            <div class="row">
                <header>

                    <div class="col-md-5" style="margin-top: 15px;float: right">
                        <div class="header-rightside">
                            <ul class="list-inline header-top pull-right">
                                <li class="messagebell">
                                    <a title="Yeni mesaj" href="{{url('/message')}}" class="icon-info">
                                        <i  class="fa fa-envelope" aria-hidden="true"></i>
                                        <span class="label label-primary message-count">{{$messagecount}}</span>
                                    </a>
                                </li>
                                <li class="orderbell">
                                    <a title="Yeni sifariş" href="{{url('/order')}}" class="icon-info">
                                        <i  class="fa fa-bell" aria-hidden="true"></i>
                                        <span class="label label-primary ordercount">{{$count}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>
            <div>
                @yield('key')
            </div>
        </div>
    </div>
    <script>
        $('.elements li').on('click','a',function (){
            var par=$(this).closest('li');
            par.removeClass().addClass('active')
        })

        $('')
    </script>

</div>
</body>
