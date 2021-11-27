<!DOCTYPE html>
<html lang="en">
<head>
  <link href="{{asset('public/fontend/User/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('public/fontend/User/css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/fontend/User/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/fontend/User/font-awesome/css/font-awesome.css')}}">
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" style="color: white;" href="{{URL::to('/header')}}">NQN Khách hàng</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse" >
          <ul class="nav navbar-nav side-nav" style="background-image: url('public/fontend/User/images/userlayout.png');">
          <li>
              <a href="{{URL::to('/thongtin-canhan')}}" class="dropdown-toggle"><i class="fa fa-caret-square-o-down"></i>thông tin</a>
          </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Phòng <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL::to('/them-phong')}}">Thêm phòng</a></li>
                <li><a href="{{URL::to('/qly-phong')}}">Quản lý phòng</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Loại phòng <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL::to('/them-loai-phong')}}">Thêm loại phòng</a></li>
                <li><a href="{{URL::to('/qly-loai-phong')}}">Quản lý loại phòng</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Khách trọ <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL::to('/them-khach-tro')}}">Thêm khách trọ</a></li>
                <li><a href="{{URL::to('/qly-khach-tro')}}">Quản lý khách trọ</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" style="color: White;" data-toggle="dropdown"><i class="fa fa-user"></i> 
                <?php
                  use Illuminate\Support\Facades\Session;
                  $name = Session::get('user_fullname');
                  if($name)
                  {
                    echo $name;
                  }
                ?>
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{URL::to('/thongtin-user')}}"><i class="fa fa-user"></i>Thông tin đăng nhập</a></li>
                <li class="divider"></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-power-off"></i>Log Out</a></li>
              </ul>
            </li>
          </ul>
         
        </div>
</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      @yield('content')
    </div>
  </div> 
</div>
</div>
    <script src="{{asset('public/fontend/User/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('public/fontend/User/js/bootstrap.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="{{asset('public/fontend/User/js/morris/chart-data-morris.js')}}"></script>
    <script src="{{asset('public/fontend/User/js/tablesorter/jquery.tablesorter.js')}}"></script>
    <script src="{{asset('public/fontend/User/js/tablesorter/tables.js')}}"></script>
</body>
</html>